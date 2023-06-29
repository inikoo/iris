<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Tue, 30 Aug 2022 19:13:08 Malaysia Time, Kuala Lumpur, Malaysia
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Fulfilment;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;



/**
 * App\Models\Fulfilment\LocationStock
 *
 * @property int $id
 * @property int $stock_id
 * @property int $location_id
 * @property string $quantity in units
 * @property string $type
 * @property int|null $picking_priority
 * @property string|null $notes
 * @property array $data
 * @property array $settings
 * @property string|null $audited_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $source_stock_id
 * @property int|null $source_location_id
 * @property-read \App\Models\Fulfilment\Location $location
 * @property-read \App\Models\Fulfilment\Stock $stock
 * @method static Builder|LocationStock newModelQuery()
 * @method static Builder|LocationStock newQuery()
 * @method static Builder|LocationStock query()
 * @method static Builder|LocationStock whereAuditedAt($value)
 * @method static Builder|LocationStock whereCreatedAt($value)
 * @method static Builder|LocationStock whereData($value)
 * @method static Builder|LocationStock whereId($value)
 * @method static Builder|LocationStock whereLocationId($value)
 * @method static Builder|LocationStock whereNotes($value)
 * @method static Builder|LocationStock wherePickingPriority($value)
 * @method static Builder|LocationStock whereQuantity($value)
 * @method static Builder|LocationStock whereSettings($value)
 * @method static Builder|LocationStock whereSourceLocationId($value)
 * @method static Builder|LocationStock whereSourceStockId($value)
 * @method static Builder|LocationStock whereStockId($value)
 * @method static Builder|LocationStock whereType($value)
 * @method static Builder|LocationStock whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LocationStock extends Pivot
{

    protected $casts = [
        'data'     => 'array',
        'settings' => 'array'
    ];

    protected $attributes = [
        'data'     => '{}',
        'settings' => '{}',
    ];

    protected $guarded = [];


    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

}
