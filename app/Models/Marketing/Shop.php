<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Fri, 26 Aug 2022 01:29:30 Malaysia Time, Kuala Lumpur, Malaysia
 *  Copyright (c) 2022, Raul A Perusquia F
 */

namespace App\Models\Marketing;

use App\Models\Sales\Customer;
use App\Models\Sales\Order;
use App\Models\Web\Website;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;



/**
 * App\Models\Marketing\Shop
 *
 * @property int $id
 * @property string|null $slug
 * @property string $code
 * @property string $name
 * @property string|null $company_name
 * @property string|null $contact_name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $url
 * @property string|null $tax_number
 * @property string|null $tax_number_status
 * @property string|null $identity_document_type
 * @property string|null $identity_document_number
 * @property int|null $address_id
 * @property array $location
 * @property string $state
 * @property string $type
 * @property string|null $subtype
 * @property string|null $open_at
 * @property string|null $closed_at
 * @property int $language_id
 * @property int $currency_id
 * @property int $timezone_id
 * @property array $data
 * @property array $settings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $source_id
 * @property-read \Illuminate\Database\Eloquent\Collection|Customer[] $customers
 * @property-read int|null $customers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Marketing\Product[] $products
 * @property-read int|null $products_count
 * @property-read Website|null $website
 * @method static Builder|Shop newModelQuery()
 * @method static Builder|Shop newQuery()
 * @method static \Illuminate\Database\Query\Builder|Shop onlyTrashed()
 * @method static Builder|Shop query()
 * @method static Builder|Shop whereAddressId($value)
 * @method static Builder|Shop whereClosedAt($value)
 * @method static Builder|Shop whereCode($value)
 * @method static Builder|Shop whereCompanyName($value)
 * @method static Builder|Shop whereContactName($value)
 * @method static Builder|Shop whereCreatedAt($value)
 * @method static Builder|Shop whereCurrencyId($value)
 * @method static Builder|Shop whereData($value)
 * @method static Builder|Shop whereDeletedAt($value)
 * @method static Builder|Shop whereEmail($value)
 * @method static Builder|Shop whereId($value)
 * @method static Builder|Shop whereIdentityDocumentNumber($value)
 * @method static Builder|Shop whereIdentityDocumentType($value)
 * @method static Builder|Shop whereLanguageId($value)
 * @method static Builder|Shop whereLocation($value)
 * @method static Builder|Shop whereName($value)
 * @method static Builder|Shop whereOpenAt($value)
 * @method static Builder|Shop wherePhone($value)
 * @method static Builder|Shop whereSettings($value)
 * @method static Builder|Shop whereSlug($value)
 * @method static Builder|Shop whereSourceId($value)
 * @method static Builder|Shop whereState($value)
 * @method static Builder|Shop whereSubtype($value)
 * @method static Builder|Shop whereTaxNumber($value)
 * @method static Builder|Shop whereTaxNumberStatus($value)
 * @method static Builder|Shop whereTimezoneId($value)
 * @method static Builder|Shop whereType($value)
 * @method static Builder|Shop whereUpdatedAt($value)
 * @method static Builder|Shop whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|Shop withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Shop withoutTrashed()
 * @mixin \Eloquent
 */
class Shop extends Model
{

    use SoftDeletes;

    protected $casts = [
        'data'     => 'array',
        'settings' => 'array',
        'location' => 'array'
    ];

    protected $attributes = [
        'data'     => '{}',
        'settings' => '{}',
        'location' => '{}',
    ];

    protected $guarded = [];

    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function website(): HasOne
    {
        return $this->hasOne(Website::class);
    }



}
