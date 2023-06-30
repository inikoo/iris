<!--
  -  Author: Raul Perusquia <raul@inikoo.com>
  -  Created: Tue, 08 Nov 2022 21:42:27 Malaysia Time, Sheffield, UK
  -  Copyright (c) 2022, Raul A Perusquia Flores
  -->

<script setup>
import Checkbox from '@/Components/Checkbox.vue';

import {Head, Link, useForm} from '@inertiajs/vue3';

import Password from '@/Components/Forms/Inputs/Password.vue';
import ValidationErrors from '@/Components/Forms/ValidationErrors.vue';
import { trans } from 'laravel-vue-i18n';

const form = useForm({
    username: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template layout="Ecommerce">
    <Head title="Login" />


    <div class="flex  flex-1 flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company" />
            <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
            <div class="bg-white px-6 py-12 shadow sm:rounded-lg sm:px-12">
                <form class="space-y-6" @submit.prevent="submit">
                    <div>
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">{{ trans('Username') }}/{{ trans('Email') }}</label>
                        <div class="mt-2">
                            <input id="username" name="username" type="username" autocomplete="username" required=""
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                                <Password id="password" name="password" type="password"
                                    class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <Checkbox name="remember-me" id="remember-me" v-model:checked="form.remember"
                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900"> {{ trans('Remember me') }}
                            </label>
                        </div>

                        <div class="text-sm leading-6">
                            <Link v-if="canResetPassword" :href="route('password.request')"
                                class="underline text-sm text-gray-600 hover:text-gray-900">
                            {{ trans('Forgot your password?') }}
                            </Link>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                            in</button>
                    </div>
                </form>
                <ValidationErrors />
            </div>

        </div>
    </div>
</template>





