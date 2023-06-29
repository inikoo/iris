<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Thu, 29 Jun 2023 11:58:42 Sanur, Indonesia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\Instance;

use App\Models\Central\Domain;
use App\Models\SysAdmin\Instance;
use Illuminate\Support\Facades\Artisan;
use Lorisleiva\Actions\Concerns\AsController;

class DeleteInstance
{
    use AsController;

    public function handle(Instance $instance): bool
    {
        Artisan::call("domain:remove $instance->url --force");

        return $instance->delete();
    }

    public function asController(Instance $instance): bool
    {
        return $this->handle($instance);
    }

    public function inDomain(Domain $domain): bool
    {
        $instance = Instance::where('domain_id', $domain->id)->firstOrFail();

        return $this->handle($instance);
    }


    public function jsonResponse(bool $deleted): array
    {
        return [
            'deleted' => $deleted
        ];
    }


}



