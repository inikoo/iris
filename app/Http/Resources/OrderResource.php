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

    public function toArray($request): array
    {
        return [
            'slug'          => $this->slug,
            'code'          => $this->number,
            'order_number'  => $this->customer_number,
            'delivery_data' => new OrderDeliveryData($this)


        ];
    }
}
