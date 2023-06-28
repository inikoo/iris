<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 17:40:26 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\Instance;

use App\Http\Resources\InstanceResource;
use App\Models\SysAdmin\Instance;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Lorisleiva\Actions\Concerns\AsAction;

class IndexInstances
{
    use AsAction;


    public function asController(): Collection
    {
        return Instance::all();
    }

    public function jsonResponse($domains): AnonymousResourceCollection
    {
        return InstanceResource::collection($domains);
    }

}



