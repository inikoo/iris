<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Mon, 03 Jul 2023 11:27:17 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Extensions;


use App\Actions\Auth\WebUser\UpdateWebUser;
use App\Enums\Auth\WebUser\WebUserAuthTypeEnum;
use App\Models\Auth\WebUser;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Arr;

class UserWithLegacyPasswordProvider extends EloquentUserProvider
{

    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        if (is_null($plain = $credentials['password'])) {
            return false;
        }


        if ($user instanceof WebUser && $user->auth_type == WebUserAuthTypeEnum::AURORA) {
            if (hash('sha256', $plain) == Arr::get($user->data,'legacy_password') ) {
                UpdateWebUser::run(
                    $user,
                    [
                        'password' => $plain
                    ]
                );

                return true;
            }

            return false;
        } else {
            return $this->hasher->check($plain, $user->getAuthPassword());
        }
    }

}
