<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 18:19:50 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Central;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MichaelAChrisco\ReadOnly\ReadOnlyTrait;


class Tenant extends Model
{
    use ReadOnlyTrait;

    protected $connection = 'aiku_central';


    public function centralDomains(): HasMany
    {
        return $this->hasMany(Domain::class);
    }


}
