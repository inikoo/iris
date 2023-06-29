<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Thu, 29 Jun 2023 12:26:07 Malaysia Time, Sanur, Indonesia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Actions\Central\Domain;

use App\Http\Resources\DomainResource;
use App\Models\Central\Domain;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Lorisleiva\Actions\Concerns\AsController;

class IndexDomains
{
    use AsController;


    public function asController(): Collection
    {
        return Domain::all();
    }

    public function jsonResponse($domains): AnonymousResourceCollection
    {
        return DomainResource::collection($domains);
    }

}



