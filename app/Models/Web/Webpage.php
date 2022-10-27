<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Tue, 18 Oct 2022 17:09:29 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MichaelAChrisco\ReadOnly\ReadOnlyTrait;


/**
 * App\Models\Web\Webpage
 *
 * @property-read \App\Models\Web\WebsiteNode|null $websiteNode
 * @method static Builder|Webpage newModelQuery()
 * @method static Builder|Webpage newQuery()
 * @method static Builder|Webpage query()
 * @mixin \Eloquent
 */
class Webpage extends Model
{
    use ReadOnlyTrait;


    public function websiteNode(): BelongsTo
    {
        return $this->belongsTo(WebsiteNode::class);
    }

}
