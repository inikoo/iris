<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Tue, 08 Nov 2022 23:38:52 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Auth\Login;

use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Inertia\Response;

class ShowLogin
{
    use AsAction;

    public function asController(): Response
    {
        return Inertia::render(
            'Auth/Login',[

        ]);
    }



}

