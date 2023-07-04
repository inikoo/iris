<!--
  -  Author: Raul Perusquia <raul@inikoo.com>
  -  Created: Tue, 08 Nov 2022 21:42:27 Malaysia Time, Sheffield, UK
  -  Copyright (c) 2022, Raul A Perusquia Flores
  -->

<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';

import Password from '@/Components/Auth/LoginPassword.vue';
import ValidationErrors from '@/Components/Forms/ValidationErrors.vue';
import { trans } from 'laravel-vue-i18n';
import FocusGuestLayout from '@/Layouts/FocusGuestLayout.vue';
import Ecommerce from '@/Layouts/Ecommerce.vue';


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

const defineOptionsValue = 'Ecommerce';

defineOptions({ layout: defineOptionsValue == 'FocusGuestLayout' ? FocusGuestLayout : Ecommerce });

router.on('success', (event) => {
    console.log(`Successfully made a visit to ${event.detail.page.url}`)
})

</script>
  
  
<template>
    <Head title="Login" />

    <div class="flex min-h-full flex-1 flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
            <div class="bg-white px-6 py-12 shadow sm:rounded-lg sm:px-12">
                <form class="  space-y-6" @submit.prevent="submit">
                    <div>
                        <label for="login" class="block text-sm font-medium text-gray-700">{{ trans('Username') }}</label>
                        <div class="mt-1">
                            <input v-model="form.username" id="username" name="username" autocomplete="username" required=""
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700"> {{ trans('Password') }}
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <Password id="password" name="password" v-model="form.password" />
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <Checkbox name="remember-me" id="remember-me" v-model:checked="form.remember" />
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900"> {{ trans('Remember me') }}
                            </label>
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ trans('Sign in') }}
                        </button>
                    </div>
                    <div><ValidationErrors /></div>
                    <div class="text-sm ">
                        <div class="mb-2">
                            <Link :href="route('password.request')"
                                class="underline text-sm text-gray-600 hover:text-gray-900">
                            {{ trans('Forgot your password?') }}
                            </Link>
                        </div>
                        <div>
                            <Link :href="route('register')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            {{ trans("Don't have an account? Register here") }}
                            </Link>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</template>
  
  
  
  
  
  