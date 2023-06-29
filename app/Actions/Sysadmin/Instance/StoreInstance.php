<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 17:59:12 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\Instance;

use App\Http\Resources\InstanceResource;
use App\Models\Central\Domain;
use App\Models\SysAdmin\Instance;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\WithAttributes;

class StoreInstance
{
    use AsAction, WithAttributes;


    private ?Domain $domain;

    public function handle(Domain $domain, array $modelData, string $authToken = null): Instance
    {
        $instance = Instance::create($modelData);
        $exitCode = Artisan::call("domain:add $instance->url");


        if ($exitCode > 0) {
            abort(422, 'domain.add command failed');
        }

        $environmentData =
            [
                'WEBSITE_ID'     => $instance->website_id,
                'WEBSITE_DOMAIN' => $instance->url,
                'SHOP_ID'        => $instance->shop_id,
                'DB_CONNECTION'  => 'aiku',
                'AIKU_DB_SCHEMA' => 'tenant_'.$domain->tenant->code
            ];

        if ($authToken) {
            $environmentData['AIKU_TOKEN'] = $authToken;
        }

        $environmentData = json_encode($environmentData);
        $exitCode        = Artisan::call("domain:update_env --domain_values='$environmentData' $instance->url");

        if ($exitCode > 0) {
            abort(422, 'instance.update_env command failed');
        }
        if (app()->environment('production') or app()->environment('staging')) {
            Artisan::call("config:cache --domain=$instance->url");
        }

        return $instance;
    }

    public function rules(): array
    {
        return [
            'domain_id'  => ['required', 'unique:instances'],
            'tenant_id'  => ['required', 'exists:App\Models\Central\Tenant,id'],
            'website_id' => ['required', 'integer'],
            'shop_id'    => ['required', 'integer'],
            'slug'       => ['required', 'string'],
            'url'        => ['required', 'string', 'unique:instances'],
            'aiku_token' => ['sometimes', 'string'],

        ];
    }

    public function prepareForValidation(ActionRequest $request): void
    {
        $request->merge(
            [
                'domain_id'  => $this->domain->id,
                'slug'       => $this->domain->slug,
                'tenant_id'  => $this->domain->tenant_id,
                'website_id' => $this->domain->website_id,
                'shop_id'    => $this->domain->shop_id,

            ]
        );
    }


    public function asController(Domain $domain, ActionRequest $request): Instance
    {
        $this->domain = $domain;

        $request->validate();


        return $this->handle(
            domain: $domain,
            modelData: Arr::except($request->validated(), 'aiku_token'),
            authToken: Arr::get($request->validated(), 'aiku_token')

        );
    }

    public function jsonResponse(Instance $instance): InstanceResource
    {
        return new InstanceResource($instance);
    }


}



