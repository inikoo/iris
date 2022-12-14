<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Thu, 01 Dec 2022 10:26:22 Central Indonesia Time, Kuta, Bali, Indonesia
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Fulfilment;


use App\Models\Traits\HasOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class FulfilmentOrder extends Model
{

    use HasOrder;
    use SoftDeletes;

    protected $casts = [
        'data' => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
    ];

    protected $guarded = [];

    public function items(): HasMany
    {
        return $this->hasMany(FulfilmentOrderItem::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
