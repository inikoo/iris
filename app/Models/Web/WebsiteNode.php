<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Tue, 18 Oct 2022 17:08:33 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MichaelAChrisco\ReadOnly\ReadOnlyTrait;


/**
 * App\Models\Web\WebsiteNode
 *
 * @property-read \App\Models\Web\Webpage|null $webpage
 * @property-read \App\Models\Web\Website|null $website
 * @method static Builder|WebsiteNode newModelQuery()
 * @method static Builder|WebsiteNode newQuery()
 * @method static Builder|WebsiteNode query()
 * @mixin \Eloquent
 */
class WebsiteNode extends Model
{
    use ReadOnlyTrait;


    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }

    public function webpage(): BelongsTo
    {
        return $this->belongsTo(Webpage::class);
    }

}
