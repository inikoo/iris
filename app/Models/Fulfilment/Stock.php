<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Fri, 11 Nov 2022 13:55:00 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Fulfilment;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * App\Models\Fulfilment\Stock
 *
 * @property int $id
 * @property string $slug
 * @property string $code
 * @property string $owner_type
 * @property int $owner_id
 * @property int|null $stock_family_id
 * @property string $composition
 * @property string|null $state
 * @property string|null $quantity_status
 * @property bool $sellable
 * @property bool $raw_material
 * @property string|null $barcode
 * @property string|null $description
 * @property int|null $pack units per pack
 * @property int|null $outer units per outer
 * @property int|null $carton units per carton
 * @property string|null $quantity stock quantity in units
 * @property float|null $available_forecast days
 * @property string|null $value
 * @property int|null $image_id
 * @property int|null $package_image_id
 * @property mixed $settings
 * @property mixed $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $activated_at
 * @property string|null $discontinuing_at
 * @property string|null $discontinued_at
 * @property string|null $deleted_at
 * @property int|null $source_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fulfilment\Location[] $locations
 * @property-read int|null $locations_count
 * @method static Builder|Stock newModelQuery()
 * @method static Builder|Stock newQuery()
 * @method static Builder|Stock query()
 * @method static Builder|Stock whereActivatedAt($value)
 * @method static Builder|Stock whereAvailableForecast($value)
 * @method static Builder|Stock whereBarcode($value)
 * @method static Builder|Stock whereCarton($value)
 * @method static Builder|Stock whereCode($value)
 * @method static Builder|Stock whereComposition($value)
 * @method static Builder|Stock whereCreatedAt($value)
 * @method static Builder|Stock whereData($value)
 * @method static Builder|Stock whereDeletedAt($value)
 * @method static Builder|Stock whereDescription($value)
 * @method static Builder|Stock whereDiscontinuedAt($value)
 * @method static Builder|Stock whereDiscontinuingAt($value)
 * @method static Builder|Stock whereId($value)
 * @method static Builder|Stock whereImageId($value)
 * @method static Builder|Stock whereOuter($value)
 * @method static Builder|Stock whereOwnerId($value)
 * @method static Builder|Stock whereOwnerType($value)
 * @method static Builder|Stock wherePack($value)
 * @method static Builder|Stock wherePackageImageId($value)
 * @method static Builder|Stock whereQuantity($value)
 * @method static Builder|Stock whereQuantityStatus($value)
 * @method static Builder|Stock whereRawMaterial($value)
 * @method static Builder|Stock whereSellable($value)
 * @method static Builder|Stock whereSettings($value)
 * @method static Builder|Stock whereSlug($value)
 * @method static Builder|Stock whereSourceId($value)
 * @method static Builder|Stock whereState($value)
 * @method static Builder|Stock whereStockFamilyId($value)
 * @method static Builder|Stock whereUpdatedAt($value)
 * @method static Builder|Stock whereValue($value)
 * @mixin \Eloquent
 */
class Stock extends Model
{

    public function locations(): BelongsToMany
    {
        return $this->belongsToMany(Location::class)->using(LocationStock::class)->withTimestamps()
            ->withPivot('quantity');
    }

}
