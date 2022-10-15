<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 11:14:02 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\Admin;

use App\Actions\Sysadmin\User\StoreUser;
use App\Models\SysAdmin\Admin;
use Illuminate\Console\Command;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreAdmin
{
    use AsAction;

    public string $commandSignature = 'create:admin {name} {email} {--slug=}';


    public function handle(array $modelData): Admin
    {
        return Admin::create($modelData);
    }


    public function asCommand(Command $command): int
    {
        $modelData = [
            'name'  => $command->argument('name'),
            'email' => $command->argument('email')
        ];
        if ($command->option('slug')) {
            $modelData['slug'] = $command->option('slug');
        }


        $admin = $this->handle($modelData);

        $user = StoreUser::run($admin);


        $token = $user->createToken('pika-access', ['pika'])->plainTextToken;
        $command->line("SysAdmin access token: $token");


        return 0;
    }


}



