<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 18:19:50 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Central;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MichaelAChrisco\ReadOnly\ReadOnlyTrait;

/**
 * App\Models\Central\Tenant
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Central\CentralDomain[] $centralDomains
 * @property-read int|null $central_domains_count
 * @method static Builder|Tenant newModelQuery()
 * @method static Builder|Tenant newQuery()
 * @method static Builder|Tenant query()
 * @mixin \Eloquent
 */
class Tenant extends Model
{
    use ReadOnlyTrait;

    protected $connection = 'pika';


    public function centralDomains(): HasMany
    {
        return $this->hasMany(CentralDomain::class);
    }


}
