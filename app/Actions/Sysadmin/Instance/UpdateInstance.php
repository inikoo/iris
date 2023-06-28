<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 12 Nov 2022 15:19:20 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\Instance;

use App\Actions\WithActionUpdate;
use App\Http\Resources\InstanceResource;
use App\Models\SysAdmin\Instance;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Lorisleiva\Actions\ActionRequest;

class UpdateInstance
{
    use WithActionUpdate;



    public function handle(Instance $instance, array $modelData): Instance
    {
        if (Arr::exists($modelData, 'aiku_token')) {
            $environmentData = json_encode(
                [
                    'AIKU_TOKEN' => Arr::pull($modelData, 'aiku_token')
                ]

            );
            Artisan::call("domain:update_env --Instance_values='$environmentData' $instance->url");
            if (app()->environment('production') or app()->environment('staging')) {
                Artisan::call("config:cache --Instance=$instance->url");
            }

        }


        return $this->update($instance, $modelData);
    }

    public function rules(): array
    {
        return [
            'aiku_token' => ['sometimes', 'string']
        ];
    }


    public function asController(Instance $instance, ActionRequest $request): Instance
    {
        $request->validate();


        return $this->handle($instance, $request->only(['aiku_token']));
    }

    public function jsonResponse(Instance $instance): InstanceResource
    {
        return new InstanceResource($instance);
    }


}



