<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Tue, 08 Nov 2022 23:43:10 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Auth\Login;


use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsController;


class Login
{
    use AsController;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function handle(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        Session::put('reloadLayout', '1');


        /* Uncomment when multilingual implemented
        $webUser   = auth()->user();
        $language = $user->language;
        if($language) {
            app()->setLocale($language);
        }
        */

        return redirect()->intended(RouteServiceProvider::HOME);
    }

}
