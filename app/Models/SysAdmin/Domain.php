<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 12:14:16 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\SysAdmin;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\SysAdmin\Domain
 *
 * @property int $id
 * @property string $slug
 * @property string $url
 * @property string $tenant_id
 * @property int $website_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Domain newModelQuery()
 * @method static Builder|Domain newQuery()
 * @method static Builder|Domain query()
 * @method static Builder|Domain whereCreatedAt($value)
 * @method static Builder|Domain whereId($value)
 * @method static Builder|Domain whereSlug($value)
 * @method static Builder|Domain whereTenantId($value)
 * @method static Builder|Domain whereUpdatedAt($value)
 * @method static Builder|Domain whereUrl($value)
 * @method static Builder|Domain whereWebsiteId($value)
 * @mixin \Eloquent
 */
class Domain extends Model
{
    use HasSlug;

    protected $guarded = [
    ];


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('url')
            ->saveSlugsTo('slug');
    }
}
