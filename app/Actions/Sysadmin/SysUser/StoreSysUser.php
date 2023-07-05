<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 11:12:49 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\SysUser;

use App\Models\SysAdmin\Admin;
use App\Models\SysAdmin\SysUser;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreSysUser
{
    use AsAction;


    public function handle(Admin $admin): SysUser
    {
        /** @var \App\Models\SysAdmin\SysUser $sysUser */
        $sysUser = $admin->sysUser()->create([
            'code' => $admin->slug
        ]);

        return $sysUser;
    }


}
