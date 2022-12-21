<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Wed, 21 Dec 2022 14:02:30 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $slug
 * @property string $number
 * @property string $customer_number
 */
class OrderResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'slug'            => $this->slug,
            'number'          => $this->number,
            'customer_number' => $this->customer_number,


        ];
    }
}
