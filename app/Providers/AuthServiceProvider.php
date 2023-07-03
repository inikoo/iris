<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Sun, 02 Jul 2023 12:40:42 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Providers;

use App\Extensions\UserWithLegacyPasswordProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [];


    public function boot(): void
    {
        $this->registerPolicies();

        Auth::provider('user-with-legacy-password', function (Application $app, array $config) {
            return new UserWithLegacyPasswordProvider($app['hash'], $config['model']);
        });
    }
}
