<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Tue, 10 Jan 2023 19:46:23 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Http\Resources;

use App\Models\Helpers\Address;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $email
 * @property string $phone
 * @property Address $deliveryAddress
 */
class OrderDeliveryDataResource extends JsonResource
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
