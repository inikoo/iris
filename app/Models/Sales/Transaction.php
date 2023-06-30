<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 27 Aug 2022 23:15:42 Malaysia Time, Kuala Lumpur, Malaysia
 *  Copyright (c) 2022, Raul A Perusquia F
 */

namespace App\Models\Sales;

use App\Models\Marketing\Shop;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Sales\Transaction
 *
 * @property int $id
 * @property int $shop_id
 * @property int $customer_id
 * @property int|null $order_id
 * @property int|null $invoice_id
 * @property string $type
 * @property string $state
 * @property string $status
 * @property string|null $item_type
 * @property int|null $item_id
 * @property string $quantity_ordered
 * @property string $quantity_bonus
 * @property string $quantity_dispatched
 * @property string $quantity_fail
 * @property string $quantity_cancelled
 * @property string $discounts
 * @property string $net
 * @property int|null $tax_band_id
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $source_id
 * @property-read \App\Models\Sales\Customer $customer
 * @property-read Model|\Eloquent $item
 * @property-read \App\Models\Sales\Order|null $order
 * @property-read Shop $shop
 * @method static Builder|Transaction newModelQuery()
 * @method static Builder|Transaction newQuery()
 * @method static Builder|Transaction query()
 * @method static Builder|Transaction whereCreatedAt($value)
 * @method static Builder|Transaction whereCustomerId($value)
 * @method static Builder|Transaction whereData($value)
 * @method static Builder|Transaction whereDeletedAt($value)
 * @method static Builder|Transaction whereDiscounts($value)
 * @method static Builder|Transaction whereId($value)
 * @method static Builder|Transaction whereInvoiceId($value)
 * @method static Builder|Transaction whereItemId($value)
 * @method static Builder|Transaction whereItemType($value)
 * @method static Builder|Transaction whereNet($value)
 * @method static Builder|Transaction whereOrderId($value)
 * @method static Builder|Transaction whereQuantityBonus($value)
 * @method static Builder|Transaction whereQuantityCancelled($value)
 * @method static Builder|Transaction whereQuantityDispatched($value)
 * @method static Builder|Transaction whereQuantityFail($value)
 * @method static Builder|Transaction whereQuantityOrdered($value)
 * @method static Builder|Transaction whereShopId($value)
 * @method static Builder|Transaction whereSourceId($value)
 * @method static Builder|Transaction whereState($value)
 * @method static Builder|Transaction whereStatus($value)
 * @method static Builder|Transaction whereTaxBandId($value)
 * @method static Builder|Transaction whereType($value)
 * @method static Builder|Transaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    protected $table = 'transactions';

    protected $casts = [
        'data' => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
    ];

    protected $guarded = [];


    public function item(): MorphTo
    {
        return $this->morphTo();
    }


    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }



}
