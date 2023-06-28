<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Wed, 28 Jun 2023 13:11:58 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InstanceResource extends JsonResource
{

    public function toArray($request): array
    {
        /** @var \App\Models\SysAdmin\Instance $instance */
        $instance = $this;

        return [
            'slug'       => $instance->slug,
            'created_at' => $instance->created_at
        ];
    }
}
