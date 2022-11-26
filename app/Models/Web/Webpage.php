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
 * @property int $id
 * @property string $slug
 * @property string $code
 * @property string $type
 * @property int $webnode_id
 * @property mixed $components
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Web\WebsiteNode|null $websiteNode
 * @method static Builder|Webpage newModelQuery()
 * @method static Builder|Webpage newQuery()
 * @method static Builder|Webpage query()
 * @method static Builder|Webpage whereCode($value)
 * @method static Builder|Webpage whereComponents($value)
 * @method static Builder|Webpage whereCreatedAt($value)
 * @method static Builder|Webpage whereId($value)
 * @method static Builder|Webpage whereSlug($value)
 * @method static Builder|Webpage whereType($value)
 * @method static Builder|Webpage whereUpdatedAt($value)
 * @method static Builder|Webpage whereWebnodeId($value)
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
