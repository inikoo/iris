<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Thu, 27 Oct 2022 11:55:50 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Sales;

use App\Models\Web\WebUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Sales\Customer
 *
 * @property int $id
 * @property int|null $shop_id
 * @property string $slug
 * @property string $reference customer public id
 * @property string|null $name
 * @property string|null $contact_name
 * @property string|null $company_name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $identity_document_number
 * @property string|null $website
 * @property string|null $tax_number
 * @property string|null $tax_number_status
 * @property mixed $tax_number_data
 * @property mixed $location
 * @property string $status
 * @property string|null $state
 * @property string|null $trade_state number of invoices
 * @property int|null $billing_address_id
 * @property int|null $delivery_address_id null for customers in fulfilment shops
 * @property mixed $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $source_id
 * @property-read \Illuminate\Database\Eloquent\Collection|WebUser[] $webUsers
 * @property-read int|null $web_users_count
 * @method static Builder|Customer newModelQuery()
 * @method static Builder|Customer newQuery()
 * @method static Builder|Customer query()
 * @method static Builder|Customer whereBillingAddressId($value)
 * @method static Builder|Customer whereCompanyName($value)
 * @method static Builder|Customer whereContactName($value)
 * @method static Builder|Customer whereCreatedAt($value)
 * @method static Builder|Customer whereData($value)
 * @method static Builder|Customer whereDeletedAt($value)
 * @method static Builder|Customer whereDeliveryAddressId($value)
 * @method static Builder|Customer whereEmail($value)
 * @method static Builder|Customer whereId($value)
 * @method static Builder|Customer whereIdentityDocumentNumber($value)
 * @method static Builder|Customer whereLocation($value)
 * @method static Builder|Customer whereName($value)
 * @method static Builder|Customer wherePhone($value)
 * @method static Builder|Customer whereReference($value)
 * @method static Builder|Customer whereShopId($value)
 * @method static Builder|Customer whereSlug($value)
 * @method static Builder|Customer whereSourceId($value)
 * @method static Builder|Customer whereState($value)
 * @method static Builder|Customer whereStatus($value)
 * @method static Builder|Customer whereTaxNumber($value)
 * @method static Builder|Customer whereTaxNumberData($value)
 * @method static Builder|Customer whereTaxNumberStatus($value)
 * @method static Builder|Customer whereTradeState($value)
 * @method static Builder|Customer whereUpdatedAt($value)
 * @method static Builder|Customer whereWebsite($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{

    public function webUsers(): HasMany
    {
        return $this->hasMany(WebUser::class);
    }

}
