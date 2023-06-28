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

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
