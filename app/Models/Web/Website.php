<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Tue, 18 Oct 2022 16:21:38 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MichaelAChrisco\ReadOnly\ReadOnlyTrait;

/**
 * App\Models\Web\Website
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Web\WebsiteNode[] $websiteNodes
 * @property-read int|null $website_nodes_count
 * @method static Builder|Website newModelQuery()
 * @method static Builder|Website newQuery()
 * @method static Builder|Website query()
 * @mixin \Eloquent
 */
class Website extends Model
{
    use ReadOnlyTrait;


    public function websiteNodes(): HasMany
    {
        return $this->hasMany(WebsiteNode::class);
    }

}
