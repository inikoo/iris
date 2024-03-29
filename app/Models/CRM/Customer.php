<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Wed, 05 Jul 2023 11:41:00 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Models\CRM;


use App\Models\Auth\WebUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\CRM\Customer
 *
 * @property int $id
 * @property int|null $shop_id
 * @property int|null $image_id
 * @property string $slug
 * @property string|null $reference customer public id
 * @property string|null $name
 * @property string|null $contact_name
 * @property string|null $company_name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $identity_document_type
 * @property string|null $identity_document_number
 * @property string|null $contact_website
 * @property array $location
 * @property string $status
 * @property string $state
 * @property string $trade_state number of invoices
 * @property bool $is_fulfilment
 * @property bool $is_dropshipping
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $source_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, WebUser> $webUsers
 * @property-read int|null $web_users_count
 * @method static Builder|Customer newModelQuery()
 * @method static Builder|Customer newQuery()
 * @method static Builder|Customer query()
 * @method static Builder|Customer whereCompanyName($value)
 * @method static Builder|Customer whereContactName($value)
 * @method static Builder|Customer whereContactWebsite($value)
 * @method static Builder|Customer whereCreatedAt($value)
 * @method static Builder|Customer whereData($value)
 * @method static Builder|Customer whereDeletedAt($value)
 * @method static Builder|Customer whereEmail($value)
 * @method static Builder|Customer whereId($value)
 * @method static Builder|Customer whereIdentityDocumentNumber($value)
 * @method static Builder|Customer whereIdentityDocumentType($value)
 * @method static Builder|Customer whereImageId($value)
 * @method static Builder|Customer whereIsDropshipping($value)
 * @method static Builder|Customer whereIsFulfilment($value)
 * @method static Builder|Customer whereLocation($value)
 * @method static Builder|Customer whereName($value)
 * @method static Builder|Customer wherePhone($value)
 * @method static Builder|Customer whereReference($value)
 * @method static Builder|Customer whereShopId($value)
 * @method static Builder|Customer whereSlug($value)
 * @method static Builder|Customer whereSourceId($value)
 * @method static Builder|Customer whereState($value)
 * @method static Builder|Customer whereStatus($value)
 * @method static Builder|Customer whereTradeState($value)
 * @method static Builder|Customer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{

    protected $casts = [
        'data'            => 'array',
        'location'        => 'array',
        //'state'           => CustomerStateEnum::class,
        //'status'          => CustomerStatusEnum::class,
        //'trade_state'     => CustomerTradeStateEnum::class

    ];

    protected $attributes = [
        'data'            => '{}',
        'location'        => '{}',
    ];

    protected $guarded = [];

    public function webUsers(): HasMany
    {
        return $this->hasMany(WebUser::class);
    }

}
