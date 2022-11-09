<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Tue, 08 Nov 2022 10:48:35 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnsureNoCentralDomain
{

    public function handle(Request $request, Closure $next): Response|RedirectResponse|JsonResponse
    {

        if (preg_match('/([a-z0-9]+[.])*'.preg_replace('/\./', '\.', config('app.central-domain')).'/', app()->domain)) {
            abort(404);
        }

        return $next($request);
    }
}
