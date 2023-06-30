<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Thu, 27 Oct 2022 22:04:27 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\Web;

use App\Models\Sales\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Web\WebUser
 *
 * @property int $id
 * @property string $slug
 * @property string $type
 * @property int $website_id
 * @property int $customer_id
 * @property bool $status
 * @property string $username
 * @property string|null $email
 * @property string|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property int $number_api_tokens
 * @property array $data
 * @property array $settings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $login_version
 * @property int|null $source_id
 * @property string|null $source_password source password
 * @property-read Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static Builder|WebUser newModelQuery()
 * @method static Builder|WebUser newQuery()
 * @method static Builder|WebUser query()
 * @method static Builder|WebUser whereCreatedAt($value)
 * @method static Builder|WebUser whereCustomerId($value)
 * @method static Builder|WebUser whereData($value)
 * @method static Builder|WebUser whereDeletedAt($value)
 * @method static Builder|WebUser whereEmail($value)
 * @method static Builder|WebUser whereEmailVerifiedAt($value)
 * @method static Builder|WebUser whereId($value)
 * @method static Builder|WebUser whereLoginVersion($value)
 * @method static Builder|WebUser whereNumberApiTokens($value)
 * @method static Builder|WebUser wherePassword($value)
 * @method static Builder|WebUser whereRememberToken($value)
 * @method static Builder|WebUser whereSettings($value)
 * @method static Builder|WebUser whereSlug($value)
 * @method static Builder|WebUser whereSourceId($value)
 * @method static Builder|WebUser whereSourcePassword($value)
 * @method static Builder|WebUser whereStatus($value)
 * @method static Builder|WebUser whereType($value)
 * @method static Builder|WebUser whereUpdatedAt($value)
 * @method static Builder|WebUser whereUsername($value)
 * @method static Builder|WebUser whereWebsiteId($value)
 * @mixin \Eloquent
 */
class WebUser extends Authenticatable
{
    use HasApiTokens;

    protected $guarded = [
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [

        'data'     => 'array',
        'settings' => 'array',
    ];


    protected $attributes = [
        'data'     => '{}',
        'settings' => '{}',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

}
