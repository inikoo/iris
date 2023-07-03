<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Mon, 03 Jul 2023 11:27:22 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Enums;

trait EnumHelperTrait
{
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function snake(): string
    {
        return preg_replace('/-/', '_', $this->value);
    }
}
