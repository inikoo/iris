<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Mon, 12 Dec 2022 20:13:18 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Marketing;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Marketing\Product
 *
 * @property int $id
 * @property string $slug
 * @property string $code
 * @property string|null $name
 * @property string|null $description
 * @property string $type
 * @property int $owner_id
 * @property string $owner_type
 * @property int $parent_id
 * @property string $parent_type
 * @property int|null $current_historic_product_id
 * @property int|null $shop_id
 * @property string|null $state
 * @property bool|null $status
 * @property string $trade_unit_composition
 * @property string|null $units units per outer
 * @property string $price unit price
 * @property string|null $rrp RRP per outer
 * @property int|null $available
 * @property int|null $image_id
 * @property mixed $settings
 * @property mixed $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $source_id
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereAvailable($value)
 * @method static Builder|Product whereCode($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereCurrentHistoricProductId($value)
 * @method static Builder|Product whereData($value)
 * @method static Builder|Product whereDeletedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereImageId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product whereOwnerId($value)
 * @method static Builder|Product whereOwnerType($value)
 * @method static Builder|Product whereParentId($value)
 * @method static Builder|Product whereParentType($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product whereRrp($value)
 * @method static Builder|Product whereSettings($value)
 * @method static Builder|Product whereShopId($value)
 * @method static Builder|Product whereSlug($value)
 * @method static Builder|Product whereSourceId($value)
 * @method static Builder|Product whereState($value)
 * @method static Builder|Product whereStatus($value)
 * @method static Builder|Product whereTradeUnitComposition($value)
 * @method static Builder|Product whereType($value)
 * @method static Builder|Product whereUnits($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
}
