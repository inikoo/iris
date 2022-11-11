<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 10:51:13 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */


use Illuminate\Support\Facades\Route;

Route::middleware([
                      'auth:sanctum'
                  ])->name('customer-api.')->group(function () {
    Route::prefix('user')
        ->name('user.')
        ->group(__DIR__.'/user.php');
    Route::prefix('fulfilment')
        ->name('fulfilment.')
        ->group(__DIR__.'/fulfilment.php');
});


