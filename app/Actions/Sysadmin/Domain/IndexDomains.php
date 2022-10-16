<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 17:40:26 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\Domain;

use App\Http\Resources\DomainResource;
use App\Models\SysAdmin\Domain;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Lorisleiva\Actions\Concerns\AsAction;

class IndexDomains
{
    use AsAction;


    public function asController(): Collection
    {
        return Domain::all();
    }

    public function jsonResponse($domains): AnonymousResourceCollection
    {
        return DomainResource::collection($domains);
    }

}



