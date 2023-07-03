<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Lorisleiva\Actions\Facades\Actions;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }


    public function boot()
    {
        if ($this->app->runningInConsole()) {
            Actions::registerCommands();
        }

        Relation::morphMap(
            [
                'Admin'    => 'App\Models\SysAdmin\User',
                'User'     => 'App\Models\SysAdmin\Admin',
                'Customer' => 'App\Models\Sales\Customer',
                'WebUser'  => 'App\Models\Auth\WebUser',

            ]
        );
    }
}
