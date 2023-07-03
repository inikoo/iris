<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Mon, 03 Jul 2023 11:27:17 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Enums\Auth\WebUser;

use App\Enums\EnumHelperTrait;

enum WebUserTypeEnum: string
{
    use EnumHelperTrait;

    case WEB = 'web';
    case API = 'api';
}
