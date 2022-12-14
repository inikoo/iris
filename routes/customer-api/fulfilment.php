<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Fri, 11 Nov 2022 13:34:24 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

use App\Actions\Fulfilment\FulfilmentOrder\IndexFulfilmentOrders;
use App\Actions\Fulfilment\FulfilmentOrder\ShowFulfilmentOrder;
use App\Actions\Fulfilment\Stock\IndexStocks;
use App\Actions\Fulfilment\Stock\StoreStock;
use App\Actions\Marketing\Product\IndexCustomerProducts;

Route::get('/stocks', IndexStocks::class)->name('stocks.index');
Route::post('/stocks', StoreStock::class)->name('stocks.store');

Route::get('/products', IndexCustomerProducts::class)->name('products.index');
//Route::post('/stocks', StoreProduct::class)->name('stocks.store');

Route::get('/orders', IndexFulfilmentOrders::class)->name('orders.index');
Route::get('/orders/{fulfilmentOrder}', ShowFulfilmentOrder::class)->name('orders.show');
