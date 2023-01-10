<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Tue, 10 Jan 2023 19:46:23 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $email
 */
class OrderDeliveryData extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'email' => $this->email,
            'phone' => $this->phone,
            'address'=>new AddressResource($this->deliveryAddress)


        ];
    }
}
