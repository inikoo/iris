<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Wed, 28 Jun 2023 13:11:58 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Http\Resources;

use App\Models\Central\Domain;
use Illuminate\Http\Resources\Json\JsonResource;

class DomainResource extends JsonResource
{

    public function toArray($request): array
    {
        /** @var Domain $domain */
        $domain = $this;

        return [
            'id'          => $domain->id,
            'slug'        => $domain->slug,
            'domain'      => $domain->domain,
            'tenant_id'   => $domain->tenant_id,
            'website_id'  => $domain->website_id,
            'shop_id'     => $domain->shop_id,
            'iris_id'     => $domain->iris_id,
            'iris_status' => $domain->iris_status,
            'created_at'  => $domain->created_at,
            'updated_at'  => $domain->updated_at
        ];
    }
}
