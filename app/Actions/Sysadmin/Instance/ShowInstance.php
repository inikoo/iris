<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 17:32:52 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\Instance;

use App\Http\Resources\InstanceResource;
use App\Models\Central\Domain;
use App\Models\SysAdmin\Instance;

use Lorisleiva\Actions\Concerns\AsAction;

class ShowInstance
{
    use AsAction;


    public function inDomain(Domain $domain): Instance
    {
        return Instance::where('domain_id', $domain->id)->firstOrFail();
    }

    public function asController(Instance $instance): Instance
    {
        return $instance;
    }

    public function jsonResponse(Instance $instance): InstanceResource
    {
        return new InstanceResource($instance);
    }

}
