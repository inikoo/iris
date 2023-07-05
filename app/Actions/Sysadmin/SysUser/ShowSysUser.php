<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 11:42:08 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sysadmin\SysUser;

use App\Http\Resources\SysUserResource;
use App\Models\SysAdmin\SysUser;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowSysUser
{
    use AsAction;


    public function asController(ActionRequest $request): SysUser
    {
        return $request->user();
    }

    public function jsonResponse(SysUser $sysUser): SysUserResource
    {
        $sysUser->load('userable');
        return new SysUserResource($sysUser);
    }

}
