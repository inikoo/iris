<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Fri, 11 Nov 2022 13:55:00 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Fulfilment;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Stock extends Model
{

    public function locations(): BelongsToMany
    {
        return $this->belongsToMany(Location::class)->using(LocationStock::class)->withTimestamps()
            ->withPivot('quantity');
    }

}
