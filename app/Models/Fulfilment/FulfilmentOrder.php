<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Thu, 01 Dec 2022 10:26:22 Central Indonesia Time, Kuta, Bali, Indonesia
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Fulfilment;

use App\Models\Traits\HasOrder;
use Illuminate\Database\Eloquent\Builder;
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
 * @property string|null $submitted_at
 * @property string|null $in_warehouse_at
 * @property string|null $finalised_at
 * @property string|null $dispatched_at
 * @property string|null $cancelled_at
 * @property bool|null $is_picking_on_hold
 * @property bool|null $can_dispatch
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\CRM\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Fulfilment\FulfilmentOrderItem> $items
 * @property-read int|null $items_count
 * @method static Builder|FulfilmentOrder newModelQuery()
 * @method static Builder|FulfilmentOrder newQuery()
 * @method static Builder|FulfilmentOrder onlyTrashed()
 * @method static Builder|FulfilmentOrder query()
 * @method static Builder|FulfilmentOrder whereCanDispatch($value)
 * @method static Builder|FulfilmentOrder whereCancelledAt($value)
 * @method static Builder|FulfilmentOrder whereCreatedAt($value)
 * @method static Builder|FulfilmentOrder whereCustomerClientId($value)
 * @method static Builder|FulfilmentOrder whereCustomerId($value)
 * @method static Builder|FulfilmentOrder whereData($value)
 * @method static Builder|FulfilmentOrder whereDeletedAt($value)
 * @method static Builder|FulfilmentOrder whereDispatchedAt($value)
 * @method static Builder|FulfilmentOrder whereFinalisedAt($value)
 * @method static Builder|FulfilmentOrder whereId($value)
 * @method static Builder|FulfilmentOrder whereInWarehouseAt($value)
 * @method static Builder|FulfilmentOrder whereIsPickingOnHold($value)
 * @method static Builder|FulfilmentOrder whereNumber($value)
 * @method static Builder|FulfilmentOrder whereShopId($value)
 * @method static Builder|FulfilmentOrder whereSlug($value)
 * @method static Builder|FulfilmentOrder whereState($value)
 * @method static Builder|FulfilmentOrder whereSubmittedAt($value)
 * @method static Builder|FulfilmentOrder whereUpdatedAt($value)
 * @method static Builder|FulfilmentOrder withTrashed()
 * @method static Builder|FulfilmentOrder withoutTrashed()
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
