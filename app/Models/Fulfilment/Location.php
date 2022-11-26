<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Fri, 11 Nov 2022 14:07:16 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */



namespace App\Models\Fulfilment;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * App\Models\Fulfilment\Location
 *
 * @property int $id
 * @property string $slug
 * @property int $warehouse_id
 * @property int|null $warehouse_area_id
 * @property string $state
 * @property string $code
 * @property bool $is_empty
 * @property mixed $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $source_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fulfilment\Stock[] $stocks
 * @property-read int|null $stocks_count
 * @method static Builder|Location newModelQuery()
 * @method static Builder|Location newQuery()
 * @method static Builder|Location query()
 * @method static Builder|Location whereCode($value)
 * @method static Builder|Location whereCreatedAt($value)
 * @method static Builder|Location whereData($value)
 * @method static Builder|Location whereDeletedAt($value)
 * @method static Builder|Location whereId($value)
 * @method static Builder|Location whereIsEmpty($value)
 * @method static Builder|Location whereSlug($value)
 * @method static Builder|Location whereSourceId($value)
 * @method static Builder|Location whereState($value)
 * @method static Builder|Location whereUpdatedAt($value)
 * @method static Builder|Location whereWarehouseAreaId($value)
 * @method static Builder|Location whereWarehouseId($value)
 * @mixin \Eloquent
 */
class Location extends Model
{

    public function stocks(): BelongsToMany
    {
        return $this->belongsToMany(Stock::class)->using(LocationStock::class);
    }

}
