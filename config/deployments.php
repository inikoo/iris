<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 26 Nov 2022 13:35:03 Central Indonesia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

return [

    'repo_path' => (env('APP_ENV') == 'local' ? base_path('.git') : env('REPO_DIR'))
];

