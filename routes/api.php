<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 10:51:13 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

use App\Actions\Central\Deployment\ShowDeployment;
use App\Actions\Central\Deployment\StoreDeployment;
use App\Actions\Central\Deployment\UpdateDeployment;
use App\Actions\Central\Domain\IndexDomains;
use App\Actions\Sysadmin\Instance\DeleteInstance;
use App\Actions\Sysadmin\Instance\IndexInstances;
use App\Actions\Sysadmin\Instance\ShowInstance;
use App\Actions\Sysadmin\Instance\StoreInstance;
use App\Actions\Sysadmin\Instance\UpdateInstance;
use App\Actions\Sysadmin\User\ShowUser;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:admin')->group(function () {
    Route::get('/user', ShowUser::class);

    Route::get('/domains', IndexDomains::class)->name('domains.index');

    Route::post('/domains/{domain}/instance', StoreInstance::class)->name('domains.show.instance.store');
    Route::get('/domains/{domain}/instance', [ShowInstance::class,'inDomain'])->name('domains.show.instance.show');


    Route::get('/instances', IndexInstances::class);
    Route::delete('/instances/{instance}', DeleteInstance::class);
    Route::get('/instances/{instance}', ShowInstance::class);
    Route::patch('/instances/{instance}', UpdateInstance::class);

    Route::get('/deployments/latest', [ShowDeployment::class, 'latest'])->name('deployments.latest');
    Route::get('/deployments/{deployment}', ShowDeployment::class)->name('deployments.show');
    Route::post('/deployments/create', StoreDeployment::class)->name('deployments.store');
    Route::post('/deployments/latest/edit', [UpdateDeployment::class, 'latest'])->name('deployments.edit.latest');
});

