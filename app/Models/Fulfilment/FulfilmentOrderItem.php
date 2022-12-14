<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Thu, 01 Dec 2022 10:29:38 Central Indonesia Time, Kuta, Bali, Indonesia
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Fulfilment;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class FulfilmentOrderItem extends Model
{

    protected $casts = [
        'data' => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
    ];




}
