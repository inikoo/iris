<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 10:51:13 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

use App\Actions\Sysadmin\Domain\IndexDomains;
use App\Actions\Sysadmin\Domain\StoreDomain;
use App\Actions\Sysadmin\User\ShowUser;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', ShowUser::class);

    Route::get('/domains', IndexDomains::class);
    Route::get('/domains/{domain}', ShowUser::class);
    Route::post('/domains', StoreDomain::class);
    Route::patch('/domains/{domain}', ShowUser::class);


});

