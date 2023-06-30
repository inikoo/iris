<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Tue, 10 Jan 2023 14:37:50 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Http\Resources;

use App\Models\Helpers\Address;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $reference
 * @property string $email
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property string $name
 * @property string $contact_name
 * @property string $company_name
 * @property string $phone
 * @property Address $deliveryAddress
 * @property mixed $slug
 */
class CustomerClientResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'slug'             => $this->slug,
            'reference'        => $this->reference,
            'name'             => $this->name,
            'contact_name'     => $this->contact_name,
            'company_name'     => $this->company_name,
            'email'            => $this->email,
            'phone'            => $this->phone,
            'delivery_address' => new AddressResource($this->deliveryAddress),
            'created_at'       => $this->created_at,
            'updated_at'       => $this->updated_at,

        ];
    }
}
