<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Mon, 03 Jul 2023 14:41:35 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Actions\Auth\UI\Registration;

use Inertia\Inertia;
use Inertia\Response;
use Lorisleiva\Actions\Concerns\AsController;

class ShowRegistration
{
    use AsController;

    public function asController(): Response
    {
        return Inertia::render(
            'Auth/Register',
            [

        ]
        );
    }



}
