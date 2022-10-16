<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 17:32:52 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\Domain;

use App\Http\Resources\DomainResource;
use App\Models\SysAdmin\Domain;

use Lorisleiva\Actions\Concerns\AsAction;

class ShowDomain
{
    use AsAction;


    public function asController(Domain $domain): Domain
    {
        return $domain;
    }

    public function jsonResponse(Domain $domain): DomainResource
    {
        return new DomainResource($domain);
    }

}



