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
 * @property string $url
 * @property string $purpose
 * @property string $type
 * @property int $website_id
 * @property int|null $main_variant_id
 * @property mixed $data
 * @property mixed $settings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $source_id
 * @property-read \App\Models\Web\WebpageVariant|null $websiteNode
 * @method static Builder|Webpage newModelQuery()
 * @method static Builder|Webpage newQuery()
 * @method static Builder|Webpage query()
 * @method static Builder|Webpage whereCode($value)
 * @method static Builder|Webpage whereCreatedAt($value)
 * @method static Builder|Webpage whereData($value)
 * @method static Builder|Webpage whereDeletedAt($value)
 * @method static Builder|Webpage whereId($value)
 * @method static Builder|Webpage whereMainVariantId($value)
 * @method static Builder|Webpage wherePurpose($value)
 * @method static Builder|Webpage whereSettings($value)
 * @method static Builder|Webpage whereSlug($value)
 * @method static Builder|Webpage whereSourceId($value)
 * @method static Builder|Webpage whereType($value)
 * @method static Builder|Webpage whereUpdatedAt($value)
 * @method static Builder|Webpage whereUrl($value)
 * @method static Builder|Webpage whereWebsiteId($value)
 * @mixin \Eloquent
 */
class Webpage extends Model
{
    use ReadOnlyTrait;


    public function websiteNode(): BelongsTo
    {
        return $this->belongsTo(WebpageVariant::class);
    }

}
