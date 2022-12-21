<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Tue, 20 Dec 2022 12:36:09 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */


use App\Actions\Sales\Order\IndexOrders;
use App\Actions\Sales\Order\ShowOrder;

Route::get('/orders', IndexOrders::class)->name('orders.index');
Route::get('/orders/{order}', ShowOrder::class)->name('orders.show');

