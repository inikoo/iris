<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Mon, 03 Jul 2023 11:36:34 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Models\Auth;


use App\Enums\Auth\WebUser\WebUserAuthTypeEnum;
use App\Enums\Auth\WebUser\WebUserTypeEnum;
use App\Models\Sales\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Auth\WebUser
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
 * @property WebUserAuthTypeEnum $auth_type
 * @property string|null $remember_token
 * @property int $number_api_tokens
 * @property array $data
 * @property array $settings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $source_id
 * @property WebUserTypeEnum $state
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static Builder|WebUser newModelQuery()
 * @method static Builder|WebUser newQuery()
 * @method static Builder|WebUser onlyTrashed()
 * @method static Builder|WebUser query()
 * @method static Builder|WebUser whereAuthType($value)
 * @method static Builder|WebUser whereCreatedAt($value)
 * @method static Builder|WebUser whereCustomerId($value)
 * @method static Builder|WebUser whereData($value)
 * @method static Builder|WebUser whereDeletedAt($value)
 * @method static Builder|WebUser whereEmail($value)
 * @method static Builder|WebUser whereEmailVerifiedAt($value)
 * @method static Builder|WebUser whereId($value)
 * @method static Builder|WebUser whereNumberApiTokens($value)
 * @method static Builder|WebUser wherePassword($value)
 * @method static Builder|WebUser whereRememberToken($value)
 * @method static Builder|WebUser whereSettings($value)
 * @method static Builder|WebUser whereSlug($value)
 * @method static Builder|WebUser whereSourceId($value)
 * @method static Builder|WebUser whereStatus($value)
 * @method static Builder|WebUser whereType($value)
 * @method static Builder|WebUser whereUpdatedAt($value)
 * @method static Builder|WebUser whereUsername($value)
 * @method static Builder|WebUser whereWebsiteId($value)
 * @method static Builder|WebUser withTrashed()
 * @method static Builder|WebUser withoutTrashed()
 * @mixin \Eloquent
 */
class WebUser extends Authenticatable
{
    use HasApiTokens;
    use IsWebUser;


    protected $guarded = [
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [

        'data'     => 'array',
        'settings' => 'array',
        'state'     => WebUserTypeEnum::class,
        'auth_type' => WebUserAuthTypeEnum::class,
    ];


    protected $attributes = [
        'data'     => '{}',
        'settings' => '{}',
    ];



}
