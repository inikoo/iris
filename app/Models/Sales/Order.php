<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Wed, 21 Dec 2022 13:54:26 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */


/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 27 Aug 2022 22:46:12 Malaysia Time, Kuala Lumpur, Malaysia
 *  Copyright (c) 2022, Raul A Perusquia F
 */

namespace App\Models\Sales;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sales\Order
 *
 * @property int $id
 * @property string $slug
 * @property int $shop_id
 * @property int $customer_id
 * @property int|null $customer_client_id
 * @property string|null $number
 * @property string|null $customer_number Customers own order number
 * @property string|null $type
 * @property string $state
 * @property bool $is_invoiced
 * @property bool|null $is_picking_on_hold
 * @property bool|null $can_dispatch
 * @property int|null $billing_address_id
 * @property int|null $delivery_address_id
 * @property string $items_discounts
 * @property string $items_net
 * @property int $currency_id
 * @property string $exchange
 * @property string $charges
 * @property string|null $shipping
 * @property string $net
 * @property string $tax
 * @property mixed $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $cancelled_at equivalent deleted_at
 * @property int|null $source_id
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCanDispatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCancelledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCharges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCustomerClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCustomerNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereExchange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsInvoiced($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsPickingOnHold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereItemsDiscounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereItemsNet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereNet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Order extends Model
{

    public function getRouteKeyName(): string
    {
        return 'slug';
    }


}
