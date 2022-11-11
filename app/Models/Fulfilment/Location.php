<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Fri, 11 Nov 2022 14:07:16 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */



namespace App\Models\Fulfilment;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Location extends Model
{

    public function stocks(): BelongsToMany
    {
        return $this->belongsToMany(Stock::class)->using(LocationStock::class);
    }

}
