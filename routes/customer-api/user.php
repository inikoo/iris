<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Fri, 11 Nov 2022 13:32:12 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */


use App\Actions\Web\WebUser\ShowWebUser;

Route::get('/', ShowWebUser::class)->name('show');
