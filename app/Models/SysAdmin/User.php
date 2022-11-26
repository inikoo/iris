<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Fri, 14 Oct 2022 15:58:58 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Models\SysAdmin;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


/**
 * App\Models\SysAdmin\User
 *
 * @property int $id
 * @property string $username
 * @property bool $status
 * @property string|null $parent_type
 * @property int|null $parent_id
 * @property string|null $email
 * @property string|null $about
 * @property string|null $remember_token
 * @property mixed $profile
 * @property mixed $settings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $password
 * @property int $number_tenants
 * @property string $global_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read Model|\Eloquent $userable
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereAbout($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereGlobalId($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereNumberTenants($value)
 * @method static Builder|User whereParentId($value)
 * @method static Builder|User whereParentType($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereProfile($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereSettings($value)
 * @method static Builder|User whereStatus($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUsername($value)
 * @mixin \Eloquent
 */
class User extends Model
{
    use HasApiTokens,HasSlug;

    protected $guarded = [
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('code')
            ->saveSlugsTo('code');
    }

    public function userable(): MorphTo
    {
        return $this->morphTo();
    }

}
