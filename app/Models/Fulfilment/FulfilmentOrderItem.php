<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Thu, 01 Dec 2022 10:29:38 Central Indonesia Time, Kuta, Bali, Indonesia
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Fulfilment;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Fulfilment\FulfilmentOrderItem
 *
 * @property int $id
 * @property int $shop_id
 * @property int $customer_id
 * @property int $fulfilment_order_id
 * @property string $state
 * @property string|null $item_type
 * @property int|null $item_id
 * @property string $quantity
 * @property string|null $notes
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static Builder|FulfilmentOrderItem newModelQuery()
 * @method static Builder|FulfilmentOrderItem newQuery()
 * @method static Builder|FulfilmentOrderItem query()
 * @method static Builder|FulfilmentOrderItem whereCreatedAt($value)
 * @method static Builder|FulfilmentOrderItem whereCustomerId($value)
 * @method static Builder|FulfilmentOrderItem whereData($value)
 * @method static Builder|FulfilmentOrderItem whereDeletedAt($value)
 * @method static Builder|FulfilmentOrderItem whereFulfilmentOrderId($value)
 * @method static Builder|FulfilmentOrderItem whereId($value)
 * @method static Builder|FulfilmentOrderItem whereItemId($value)
 * @method static Builder|FulfilmentOrderItem whereItemType($value)
 * @method static Builder|FulfilmentOrderItem whereNotes($value)
 * @method static Builder|FulfilmentOrderItem whereQuantity($value)
 * @method static Builder|FulfilmentOrderItem whereShopId($value)
 * @method static Builder|FulfilmentOrderItem whereState($value)
 * @method static Builder|FulfilmentOrderItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FulfilmentOrderItem extends Model
{
    protected $casts = [
        'data' => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
    ];




}
