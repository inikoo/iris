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
 * @property int $id
 * @property string $slug
 * @property int $tenant_id
 * @property int $website_id
 * @property string $domain
 * @property string|null $cloudflare_id
 * @property string|null $cloudflare_status
 * @property string|null $iris_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Central\Tenant $tenant
 * @method static Builder|Domain newModelQuery()
 * @method static Builder|Domain newQuery()
 * @method static Builder|Domain query()
 * @method static Builder|Domain whereCloudflareId($value)
 * @method static Builder|Domain whereCloudflareStatus($value)
 * @method static Builder|Domain whereCreatedAt($value)
 * @method static Builder|Domain whereDeletedAt($value)
 * @method static Builder|Domain whereDomain($value)
 * @method static Builder|Domain whereId($value)
 * @method static Builder|Domain whereIrisStatus($value)
 * @method static Builder|Domain whereSlug($value)
 * @method static Builder|Domain whereTenantId($value)
 * @method static Builder|Domain whereUpdatedAt($value)
 * @method static Builder|Domain whereWebsiteId($value)
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


}
