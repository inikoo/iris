<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Tue, 08 Nov 2022 23:43:10 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Auth\Login;

use App\Models\Web\WebUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @property \Lorisleiva\Actions\ActionRequest $request
 */
class StoreLogin
{
    use AsAction;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function asController(ActionRequest $request): RedirectResponse
    {
        $this->request = $request;
        $this->ensureIsNotRateLimited();

        /** @var WebUser $webUser */
        $webUser = WebUser::where('website_id', config('website.id'))
            ->where('username', $this->request->get('username'))->first();


        if (!$webUser) {
            $this->authFailed();
        }



        $credentials = match ($webUser->web_login_version) {
            'au' => [
                'username'                => $this->request->get('username'),
                'data->au_auth->password' => hash('sha256', $this->request->get('password')),
                'status'                  => true,
                'password'                => Arr::get($webUser->data, 'au_auth.tmp_password')
            ],
            default => array_merge($this->request->only('username', 'password'), ['status' => true])
        };




        if (!Auth::attempt($credentials, $this->request->boolean('remember'))) {
            $this->authFailed();
        }

        RateLimiter::clear($this->throttleKey());

        $this->request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }


    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    private function authFailed()
    {
        RateLimiter::hit($this->throttleKey());
        throw ValidationException::withMessages([
                                                    'username' => trans('auth.failed'),
                                                ]);
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }


    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this->request));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
                                                    'username' => trans('auth.throttle', [
                                                        'seconds' => $seconds,
                                                        'minutes' => ceil($seconds / 60),
                                                    ]),
                                                ]);
    }

    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->request->input('username')).'|'.$this->request->ip());
    }


}
