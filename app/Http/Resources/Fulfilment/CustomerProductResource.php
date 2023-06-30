<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Mon, 12 Dec 2022 20:08:47 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Http\Resources\Fulfilment;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $slug
 * @property string $code
 * @property string $name
 */
class CustomerProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'slug'=> $this->slug,
            'code'=> $this->code,
            'name'=> $this->name,

        ];
    }
}
