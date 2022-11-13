<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 17:59:12 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\Domain;

use App\Http\Resources\DomainResource;
use App\Models\Central\CentralDomain;
use App\Models\SysAdmin\Domain;
use Illuminate\Database\QueryException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\WithAttributes;
use Illuminate\Validation\Validator;

class StoreDomain
{
    use AsAction, WithAttributes;


    private ?CentralDomain $centralDomain;

    public function handle(CentralDomain $centralDomain, array $modelData): Domain
    {
        $url = app()->isProduction() ? $centralDomain->domain : $centralDomain->slug.'.test';
        try {
            $domain = Domain::create(
                [
                    'url'        => $url,
                    'slug'       => $centralDomain->slug,
                    'tenant_id'  => $centralDomain->tenant_id,
                    'website_id' => $centralDomain->website_id,
                ]
            );
        } catch (QueryException) {
            if (!Arr::get($modelData, 'soft')) {
                abort(422, 'Domain model can not be added');
            }
            $domain = Domain::where('url', $url)->firstOrFail();
        }

        $exitCode = Artisan::call("domain:add $url");


        if ($exitCode > 0) {
            abort(422, 'domain.add command failed');
        }

        $environmentData =
            [
                'WEBSITE_ID'     => $domain->website_id,
                'WEBSITE_DOMAIN' => $domain->url,
                'DB_CONNECTION'  => 'pika',
                'PIKA_DB_SCHEMA' => 'pika_'.$centralDomain->tenant->code
            ];

        if (Arr::exists($modelData, 'pika_token')) {
            $environmentData['PIKA_TOKEN'] = Arr::get($modelData, 'pika_token');
        }

        $environmentData = json_encode($environmentData);
        $exitCode        = Artisan::call("domain:update_env --domain_values='$environmentData' $url");

        if ($exitCode > 0) {
            abort(422, 'domain.update_env command failed');
        }
        if (app()->environment('production')) {
            Artisan::call("config:cache --domain=$domain->url");
        }

        return $domain;
    }

    public function rules(): array
    {
        return [
            'central_domain_id' => ['required', 'exists:App\Models\Central\CentralDomain,id'],
            'pika_token'        => ['sometimes', 'string']
        ];
    }

    public function afterValidator(Validator $validator, ActionRequest $request): void
    {
        $this->centralDomain = CentralDomain::find($request->get('central_domain_id'));

        if (!$request->exists('soft')) {
            if (Domain::where('slug', $this->centralDomain->slug)->exists()) {
                $validator->errors()->add('domain', 'Domain already exists.');
            }
        }
    }

    public function asController(ActionRequest $request): Domain
    {
        $request->validate();

        return $this->handle($this->centralDomain, $request->only(['pika_token', 'soft']));
    }

    public function jsonResponse(Domain $domain): DomainResource
    {
        return new DomainResource($domain);
    }


}



