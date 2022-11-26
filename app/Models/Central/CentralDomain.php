<?php

namespace App\Models\Central;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MichaelAChrisco\ReadOnly\ReadOnlyTrait;

/**
 * App\Models\Central\CentralDomain
 *
 * @property-read \App\Models\Central\Tenant|null $tenant
 * @method static Builder|CentralDomain newModelQuery()
 * @method static Builder|CentralDomain newQuery()
 * @method static Builder|CentralDomain query()
 * @mixin \Eloquent
 */
class CentralDomain extends Model
{
    use ReadOnlyTrait;

    protected $connection = 'pika';

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }


}
