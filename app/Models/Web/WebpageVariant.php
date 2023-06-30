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
use MichaelAChrisco\ReadOnly\ReadOnlyTrait;



/**
 * App\Models\Web\WebpageVariant
 *
 * @property int $id
 * @property string $slug
 * @property string $code
 * @property int $webpage_id
 * @property mixed $components
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Web\Webpage $webpage
 * @property-read \App\Models\Web\Website $website
 * @method static Builder|WebpageVariant newModelQuery()
 * @method static Builder|WebpageVariant newQuery()
 * @method static Builder|WebpageVariant query()
 * @method static Builder|WebpageVariant whereCode($value)
 * @method static Builder|WebpageVariant whereComponents($value)
 * @method static Builder|WebpageVariant whereCreatedAt($value)
 * @method static Builder|WebpageVariant whereId($value)
 * @method static Builder|WebpageVariant whereSlug($value)
 * @method static Builder|WebpageVariant whereUpdatedAt($value)
 * @method static Builder|WebpageVariant whereWebpageId($value)
 * @mixin \Eloquent
 */
class WebpageVariant extends Model
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
