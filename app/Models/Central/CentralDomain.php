<?php

namespace App\Models\Central;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MichaelAChrisco\ReadOnly\ReadOnlyTrait;

/**
 * App\Models\Central\CentralDomain
 *
 * @property int $id
 * @property string $slug
 * @property int $tenant_id
 * @property int $website_id
 * @property string $domain
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Central\Tenant $tenant
 * @method static Builder|CentralDomain newModelQuery()
 * @method static Builder|CentralDomain newQuery()
 * @method static Builder|CentralDomain query()
 * @method static Builder|CentralDomain whereCreatedAt($value)
 * @method static Builder|CentralDomain whereDomain($value)
 * @method static Builder|CentralDomain whereId($value)
 * @method static Builder|CentralDomain whereSlug($value)
 * @method static Builder|CentralDomain whereState($value)
 * @method static Builder|CentralDomain whereTenantId($value)
 * @method static Builder|CentralDomain whereUpdatedAt($value)
 * @method static Builder|CentralDomain whereWebsiteId($value)
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
