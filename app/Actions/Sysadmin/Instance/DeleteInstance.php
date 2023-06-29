<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Thu, 29 Jun 2023 11:58:42 Sanur, Indonesia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\Instance;

use App\Actions\WithActionUpdate;
use App\Models\SysAdmin\Instance;
use Illuminate\Support\Facades\Artisan;
use Lorisleiva\Actions\ActionRequest;

class DeleteInstance
{
    use WithActionUpdate;


    public function handle(Instance $instance): bool
    {
        Artisan::call("domain:remove $instance->url --force");
        return $instance->delete();
    }



    public function asController(Instance $instance, ActionRequest $request): bool
    {
        $request->validate();


        return $this->handle($instance);
    }

    public function jsonResponse(bool $deleted): array
    {
        return [
            'deleted'=>$deleted
        ];
    }


}



