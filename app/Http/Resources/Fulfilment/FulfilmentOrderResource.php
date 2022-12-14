<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Thu, 01 Dec 2022 10:36:16 Central Indonesia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Http\Resources\Fulfilment;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $number
 * @property ?int $customer_client_id
 * @property string $state
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property string $slug
 */
class FulfilmentOrderResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'slug'       => $this->slug,
            'number'     => $this->number,
            'client_id'  => $this->customer_client_id,
            'state'      => $this->state,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
