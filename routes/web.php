<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Tue, 08 Nov 2022 20:34:41 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

use App\Actions\Web\WebsiteNode\ShowWebsiteNode;
use Illuminate\Support\Facades\Route;



Route::get('/', [ShowWebsiteNode::class, 'home']);


Route::prefix('account')
    ->name('account.')
    ->middleware(['auth', 'verified'])
    ->group(__DIR__.'/account.php');


require __DIR__.'/auth.php';

