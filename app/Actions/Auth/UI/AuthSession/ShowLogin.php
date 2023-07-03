<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Mon, 03 Jul 2023 14:41:26 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Actions\Auth\UI\AuthSession;

use Inertia\Inertia;
use Inertia\Response;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowLogin
{
    use AsAction;

    public function asController(): Response
    {
        return Inertia::render(
            'Auth/Login',
            [

        ]
        );
    }



}
