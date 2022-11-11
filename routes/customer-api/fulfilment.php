<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Fri, 11 Nov 2022 13:34:24 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

use App\Actions\Fulfilment\Stock\IndexStocks;
use App\Actions\Fulfilment\Stock\StoreStock;

Route::get('/stocks', IndexStocks::class)->name('stocks.show');
Route::post('/stocks', StoreStock::class)->name('stocks.store');

