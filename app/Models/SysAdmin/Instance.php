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
 * App\Models\SysAdmin\Instance
 *
 * @property int $id
 * @property string $slug
 * @property string $url
 * @property int $tenant_id
 * @property int $website_id
 * @property int $domain_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Instance newModelQuery()
 * @method static Builder|Instance newQuery()
 * @method static Builder|Instance query()
 * @method static Builder|Instance whereCreatedAt($value)
 * @method static Builder|Instance whereDomainId($value)
 * @method static Builder|Instance whereId($value)
 * @method static Builder|Instance whereSlug($value)
 * @method static Builder|Instance whereTenantId($value)
 * @method static Builder|Instance whereUpdatedAt($value)
 * @method static Builder|Instance whereUrl($value)
 * @method static Builder|Instance whereWebsiteId($value)
 * @mixin \Eloquent
 */
class Instance extends Model
{
    use HasSlug;

    protected $guarded = [
    ];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('url')
            ->saveSlugsTo('slug');
    }

}
