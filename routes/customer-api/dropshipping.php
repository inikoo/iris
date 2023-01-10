<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Tue, 20 Dec 2022 12:36:09 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */


use App\Actions\Dropshipping\CustomerClient\IndexCustomerClients;
use App\Actions\Sales\Order\IndexOrders;
use App\Actions\Sales\Order\ShowOrder;
use App\Actions\Sales\Order\StoreDropshippingOrderViaAurora;

Route::get('/orders', IndexOrders::class)->name('orders.index');
Route::post('/orders', StoreDropshippingOrderViaAurora::class)->name('orders.store');

Route::get('/orders/{order}', ShowOrder::class)->name('orders.show');

Route::get('/clients', IndexCustomerClients::class)->name('clients.index');
Route::get('/clients', IndexCustomerClients::class)->name('clients.index');
