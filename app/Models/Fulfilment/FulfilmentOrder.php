<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Thu, 01 Dec 2022 10:26:22 Central Indonesia Time, Kuta, Bali, Indonesia
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Fulfilment;


use App\Models\Traits\HasOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Fulfilment\FulfilmentOrder
 *
 * @property int $id
 * @property string $slug
 * @property string|null $number
 * @property int $shop_id
 * @property int $customer_id
 * @property int|null $customer_client_id
 * @property string $state
 * @property bool|null $is_picking_on_hold
 * @property bool|null $can_dispatch
 * @property int|null $delivery_address_id
 * @property array $data
 * @property string|null $sent_warehouse_at
 * @property string|null $ready_to_dispatch_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Sales\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fulfilment\FulfilmentOrderItem[] $items
 * @property-read int|null $items_count
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder newQuery()
 * @method static \Illuminate\Database\Query\Builder|FulfilmentOrder onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereCanDispatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereCustomerClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereDeliveryAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereIsPickingOnHold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereReadyToDispatchAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereSentWarehouseAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FulfilmentOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|FulfilmentOrder withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FulfilmentOrder withoutTrashed()
 * @mixin \Eloquent
 */
class FulfilmentOrder extends Model
{

    use HasOrder;
    use SoftDeletes;

    protected $casts = [
        'data' => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
    ];

    protected $guarded = [];

    public function items(): HasMany
    {
        return $this->hasMany(FulfilmentOrderItem::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
