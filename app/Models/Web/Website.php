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
 * @property int $id
 * @property string $slug
 * @property int $shop_id
 * @property string $state
 * @property string $code
 * @property string $domain
 * @property string $name
 * @property mixed $settings
 * @property mixed $data
 * @property mixed $webnodes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $launched_at
 * @property string|null $closed_at
 * @property int|null $current_layout_id
 * @property string|null $deleted_at
 * @property int|null $source_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Web\WebsiteNode[] $websiteNodes
 * @property-read int|null $website_nodes_count
 * @method static Builder|Website newModelQuery()
 * @method static Builder|Website newQuery()
 * @method static Builder|Website query()
 * @method static Builder|Website whereClosedAt($value)
 * @method static Builder|Website whereCode($value)
 * @method static Builder|Website whereCreatedAt($value)
 * @method static Builder|Website whereCurrentLayoutId($value)
 * @method static Builder|Website whereData($value)
 * @method static Builder|Website whereDeletedAt($value)
 * @method static Builder|Website whereDomain($value)
 * @method static Builder|Website whereId($value)
 * @method static Builder|Website whereLaunchedAt($value)
 * @method static Builder|Website whereName($value)
 * @method static Builder|Website whereSettings($value)
 * @method static Builder|Website whereShopId($value)
 * @method static Builder|Website whereSlug($value)
 * @method static Builder|Website whereSourceId($value)
 * @method static Builder|Website whereState($value)
 * @method static Builder|Website whereUpdatedAt($value)
 * @method static Builder|Website whereWebnodes($value)
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
