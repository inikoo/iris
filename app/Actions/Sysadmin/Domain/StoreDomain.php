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
use Illuminate\Support\Facades\Artisan;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\WithAttributes;
use Illuminate\Validation\Validator;

class StoreDomain
{
    use AsAction, WithAttributes;


    private ?CentralDomain $centralDomain;

    public function handle(CentralDomain $centralDomain): Domain
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

            $exitCode = Artisan::call("domain:add $url");


            if ($exitCode > 0) {
                abort(422, 'domain.add command failed');
            }

            $environmentData = json_encode(
                [
                    'WEBSITE_ID' => $domain->website_id,
                    'DB_CONNECTION'=>'pika',
                    'PIKA_DB_DATABASE'=>'pika_'.$centralDomain->tenant->code
                ]
            );


            $exitCode = Artisan::call("domain:update_env --domain_values='$environmentData' $url");

            if ($exitCode > 0) {
                abort(422, 'domain.update_env command failed');
            }
        } catch (QueryException) {
            abort(422, 'Domain model can not be added');
        }

        return $domain;
    }

    public function rules(): array
    {
        return [
            'central_domain_id' => ['required', 'exists:App\Models\Central\CentralDomain,id'],
        ];
    }

    public function afterValidator(Validator $validator, ActionRequest $request): void
    {
        $this->centralDomain = CentralDomain::find($request->get('central_domain_id'));


        if (Domain::where('slug', $this->centralDomain->slug)->exists()) {
            $validator->errors()->add('domain', 'Domain already exists.');
        }
    }

    public function asController(ActionRequest $request): Domain
    {
        $request->validate();

        return $this->handle($this->centralDomain);
    }

    public function jsonResponse(Domain $domain): DomainResource
    {
        return new DomainResource($domain);
    }


}



