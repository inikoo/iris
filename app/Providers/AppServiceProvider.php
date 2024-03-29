<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Lorisleiva\Actions\Facades\Actions;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }


    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            Actions::registerCommands();
        }

        Relation::morphMap(
            [
                'SysUser'    => 'App\Models\SysAdmin\SysUser',
                'Admin'     => 'App\Models\SysAdmin\Admin',
                'Customer' => 'App\Models\CRM\Customer',
                'WebUser'  => 'App\Models\Auth\WebUser',

            ]
        );
    }
}
