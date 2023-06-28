<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Revived: Wed, 28 Jun 2023 12:50:01 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Models\Central;

use App\Models\SysAdmin\Instance;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use MichaelAChrisco\ReadOnly\ReadOnlyTrait;

/**
 * App\Models\Central\Instance
 *
 * @property-read \App\Models\Central\Tenant|null $tenant
 * @method static Builder|Domain newModelQuery()
 * @method static Builder|Domain newQuery()
 * @method static Builder|Domain query()
 * @mixin \Eloquent
 */
class Domain extends Model
{
    use ReadOnlyTrait;

    protected $connection = 'aiku_central';

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }



    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
