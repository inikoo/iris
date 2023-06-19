<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 12 Nov 2022 15:19:20 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\Domain;

use App\Actions\WithActionUpdate;
use App\Http\Resources\DomainResource;
use App\Models\Central\CentralDomain;
use App\Models\SysAdmin\Domain;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Lorisleiva\Actions\ActionRequest;

class UpdateDomain
{
    use WithActionUpdate;


    private ?CentralDomain $centralDomain;

    public function handle(Domain $domain, array $modelData): Domain
    {
        if (Arr::exists($modelData, 'aiku_token')) {
            $environmentData = json_encode(
                [
                    'AIKU_TOKEN' => Arr::pull($modelData, 'aiku_token')
                ]

            );
            Artisan::call("domain:update_env --domain_values='$environmentData' $domain->url");
            if (app()->environment('production') or app()->environment('staging')) {
                Artisan::call("config:cache --domain=$domain->url");
            }

        }


        return $this->update($domain, $modelData);
    }

    public function rules(): array
    {
        return [
            'aiku_token' => ['sometimes', 'string']
        ];
    }


    public function asController(Domain $domain, ActionRequest $request): Domain
    {
        $request->validate();


        return $this->handle($domain, $request->only(['aiku_token']));
    }

    public function jsonResponse(Domain $domain): DomainResource
    {
        return new DomainResource($domain);
    }


}



