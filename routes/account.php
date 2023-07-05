<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Tue, 08 Nov 2022 20:34:36 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

use App\Actions\CRM\Customer\ShowDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShowDashboard::class, 'home']);
