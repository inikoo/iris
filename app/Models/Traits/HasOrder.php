<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Thu, 01 Dec 2022 11:05:55 Central Indonesia Time, Kuta, Bali ,INdonesia
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Traits;

use App\Models\CRM\Customer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasOrder
{
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }


}
