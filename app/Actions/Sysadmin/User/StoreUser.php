<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 11:12:49 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\User;

use App\Models\SysAdmin\Admin;
use App\Models\SysAdmin\User;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreUser
{
    use AsAction;


    public function handle(Admin $admin): User
    {
        /** @var User $user */
        $user = $admin->user()->create([
                                           'code' => $admin->slug
                                       ]);
        return $user;
    }


}
