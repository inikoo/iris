<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Thu, 27 Oct 2022 22:50:54 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $reference
 * @property string $slug
 * @property string $email
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property string $name
 * @property string $contact_name
 * @property string $company_name
 * @property string $phone
 */
class CustomerResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'slug'         => $this->slug,
            'reference'    => $this->reference,
            'name'         => $this->name,
            'contact_name' => $this->contact_name,
            'company_name' => $this->company_name,
            'email'        => $this->email,
            'phone'        => $this->phone,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,

        ];
    }
}
