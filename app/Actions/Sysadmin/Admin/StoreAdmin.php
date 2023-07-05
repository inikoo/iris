<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 11:14:02 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\Admin;

use App\Actions\Sysadmin\SysUser\StoreSysUser;
use App\Models\SysAdmin\Admin;
use Illuminate\Console\Command;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreAdmin
{
    use AsAction;

    public string $commandSignature = 'create:admin-user {code} {name} {email}';


    public function asCommand(Command $command): int
    {
        $modelData = [
            'code'  => $command->argument('name'),
            'name'  => $command->argument('name'),
            'email' => $command->argument('email')
        ];



        $admin = Admin::create($modelData);
        $sysUser  = StoreSysUser::run($admin);


        $token = $sysUser->createToken('aiku-access', ['aiku'])->plainTextToken;
        $command->line("SysAdmin access token: $token");


        return 0;
    }


}
