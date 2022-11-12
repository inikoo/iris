<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 10:51:13 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

use App\Actions\Central\Deployment\ShowDeployment;
use App\Actions\Central\Deployment\StoreDeployment;
use App\Actions\Central\Deployment\UpdateDeployment;
use App\Actions\Sysadmin\Domain\IndexDomains;
use App\Actions\Sysadmin\Domain\ShowDomain;
use App\Actions\Sysadmin\Domain\StoreDomain;
use App\Actions\Sysadmin\Domain\UpdateDomain;
use App\Actions\Sysadmin\User\ShowUser;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:admin')->group(function () {
    Route::get('/user', ShowUser::class);

    Route::get('/domains', IndexDomains::class);
    Route::get('/domains/{domain:slug}', ShowDomain::class);
    Route::post('/domains', StoreDomain::class);
    Route::patch('/domains/{domain:slug}', UpdateDomain::class);

    Route::get('/deployments/latest', [ShowDeployment::class, 'latest'])->name('deployments.latest');
    Route::get('/deployments/{deployment}', ShowDeployment::class)->name('deployments.show');
    Route::post('/deployments/create', StoreDeployment::class)->name('deployments.store');
    Route::post('/deployments/latest/edit', [UpdateDeployment::class, 'latest'])->name('deployments.edit.latest');
});

