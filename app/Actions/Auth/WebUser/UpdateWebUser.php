<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Mon, 03 Jul 2023 11:27:17 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Actions\Auth\WebUser;

use App\Actions\WithActionUpdate;
use App\Enums\Auth\WebUser\WebUserAuthTypeEnum;
use App\Models\Auth\WebUser;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Lorisleiva\Actions\ActionRequest;

class UpdateWebUser
{
    use WithActionUpdate;

    private bool $asAction = false;


    public function handle(WebUser $webUser, array $modelData): WebUser
    {
        if (Arr::exists($modelData, 'password')) {
            data_set($modelData, 'password', Hash::make($modelData['password']));
            data_set($modelData, 'auth_type', WebUserAuthTypeEnum::DEFAULT);
            data_set($modelData, 'data.legacy_password', null);
        }

        return $this->update($webUser, $modelData, ['data', 'settings']);
    }

    public function authorize(WebUser $webUser,ActionRequest $request): bool
    {
        if ($this->asAction) {
            return true;
        }

        return $request->user()->id==$webUser->id;
    }

    public function rules(): array
    {
        return [
            'username' => ['sometimes', 'required', 'email', 'unique:App\Models\Auth\WebUser,username'],
            'password' => ['sometimes', 'required', app()->isLocal() || app()->environment('testing') ? null : Password::min(8)->uncompromised()],
            //'email'    => 'sometimes|required|email|unique:App\Models\Auth\GroupUser,email'
        ];
    }

    public function asController(WebUser $webUser, ActionRequest $request): WebUser
    {
        $request->validate();
        return $this->handle($webUser, $request->validated());
    }

    public function action(WebUser $webUser, $objectData): WebUser
    {
        $this->asAction = true;
        $this->setRawAttributes($objectData);
        $validatedData = $this->validateAttributes();

        return $this->handle($webUser, $validatedData);
    }


}
