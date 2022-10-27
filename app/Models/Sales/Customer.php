<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Thu, 27 Oct 2022 11:55:50 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Sales;

use App\Models\Web\WebUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Sales\Customer
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|WebUser[] $webUsers
 * @property-read int|null $web_users_count
 * @method static Builder|Customer newModelQuery()
 * @method static Builder|Customer newQuery()
 * @method static Builder|Customer query()
 * @mixin \Eloquent
 */
class Customer extends Model
{

    public function webUsers(): HasMany
    {
        return $this->hasMany(WebUser::class);
    }

}
