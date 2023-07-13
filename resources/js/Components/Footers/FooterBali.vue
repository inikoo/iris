<script setup lang="ts">
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'
import { v4 as uuidv4 } from 'uuid'

import { fab } from "@fortawesome/free-brands-svg-icons"
import { fas } from '@/../private/pro-solid-svg-icons'
import { far } from '@/../private/pro-regular-svg-icons'
import { fal } from '@/../private/pro-light-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { library } from '@fortawesome/fontawesome-svg-core'
library.add(fas, fab, far, fal)

const navigations = ref([
    {
        title: 'company',
        type: "list",
        id: uuidv4(),
        data: [
            { name: 'About', href: '#', id: uuidv4() },
            { name: 'Blog', href: '#', id: uuidv4() },
            { name: 'Jobs', href: '#', id: uuidv4() },
            { name: 'Press', href: '#', id: uuidv4() },
            { name: 'Partners', href: '#', id: uuidv4() },
        ],
    },
    {
        title: 'legal',
        type: "list",
        id: uuidv4(),
        data: [
            { name: 'Claim', href: '#', id: uuidv4() },
            { name: 'Privacy', href: '#', id: uuidv4() },
            { name: 'Terms', href: '#', id: uuidv4() },
        ],
    },
    {
        title: 'Description',
        type: "description",
        id: uuidv4(),
        data: "Lorem Ipsum is simply dummy te printernto electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
    },
    {
        title: 'Info',
        type: 'info',
        id: uuidv4(),
        data: [
            {
                title: 'location',
                value: 'Ancient Wisdom s.r.o.',
                icon: 'fas fa-map-marker-alt',
                id: uuidv4()
            },
            {
                title: 'billingAddress',
                value: 'Billin',
                icon: 'fas fa-map',
                id: uuidv4()
            },
            {
                title: 'vat',
                value: 'VAT: SK2120525440',
                icon: 'fas fa-balance-scale',
                id: uuidv4()
            },
            {
                title: 'building',
                value: 'Reg: 50920600',
                icon: 'fas fa-building',
                id: uuidv4()
            },
            {
                title: 'phone',
                value: '+421 (0)33 558 60 71',
                icon: 'fas fa-phone',
                id: uuidv4()
            },
            {
                title: 'email',
                value: 'contact@awgifts.eu',
                icon: 'fas fa-envelope',
                id: uuidv4(),
            },
        ],
    }

])

const copyRight = ref({ label: 'AW Advantage', href: '*' })

const socials = ref([
    {
        label: "Facebook",
        href: '#facebook',
        icon: 'fab fa-facebook',
        id: uuidv4()
    },
    {
        label: "Instagram",
        href: '#instagram',
        icon: 'fab fa-instagram',
        id: uuidv4()
    },
    {
        label: "Twitter",
        href: '#twitter',
        icon: 'fab fa-twitter',
        id: uuidv4()
    },
    {
        label: "Github",
        href: '#github',
        icon: 'fab fa-github',
        id: uuidv4()
    },
])
</script>

<template>
    <footer class="bg-gray-50 px-6" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl px-6 pb-8 sm:pt-16 lg:px-8">
            <div class="">
                <!-- Group: Contact Information -->
                <!-- <div class="mt-12 xl:mt-0 space-y-6">
                    <h3 class="text-sm font-bold leading-6 text-gray-700">Contact Information</h3>
                    <div class="flex flex-col gap-y-2.5">
                        <div v-for="address in addresses" class="grid grid-cols-[auto,1fr] gap-4 items-center justify-start gap-x-3">
                            <div class="w-5 flex items-center justify-center text-gray-400">
                                <FontAwesomeIcon :icon="address.icon" :title="address.title" aria-hidden="true" />
                            </div>
                            <span class="leading-5 text-gray-600" v-html="address.value"></span>
                        </div>
                    </div>
                </div> -->

                <!-- Group: Navigations -->
                    <div class="grid grid-flow-col gap-x-4 justify-between" style="grid-auto-columns: 1fr">
                        <!-- Navigations -->
                        <div v-for="navigation in navigations" class="space-y-6">
                            <h3 class="text-sm font-bold leading-6 text-gray-700 capitalize">{{ navigation.title }}</h3>
                            <div v-if="navigation.type === 'list'" class="space-y-2">
                                <ul role="list" class="space-y-1.5">
                                    <li v-for="item in navigation.data" :key="item.name">
                                        <a :href="item.href" class="text-sm text-gray-500 hover:text-gray-800">
                                            {{ item.name }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- Type: Description -->
                            <div v-if="navigation.type === 'description'" class="pr-5 text-sm">
                                <p class="text-gray-500">
                                    {{ navigation.data }}
                                </p>
                            </div>

                            <!-- Type: Info -->
                            <div v-if="navigation.type === 'info'">
                                <div class="flex flex-col gap-y-2.5">
                                    <div v-for="address in navigation.data" class="grid grid-cols-[auto,1fr] gap-4 items-center justify-start gap-x-3">
                                        <div class="w-5 flex items-center justify-center text-gray-400">
                                            <FontAwesomeIcon :icon="address.icon" :title="address.title" aria-hidden="true" />
                                        </div>
                                        <span class="leading-5 text-gray-500">{{ address.value }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>

            <!-- Social Media -->
            <div class="border-t border-gray-900/10 pt-8 sm:mt-10 flex flex-col md:flex-row items-center justify-between mt-16 lg:mt-18 xl:px-3">
                <div class="flex space-x-6 md:order-2">
                    <a v-for="(social, index) in socials" :key="index" :href="social.href"
                        class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">{{ social.label }}</span>
                        <FontAwesomeIcon :icon="social.icon" class="h-6 w-6" aria-hidden="true" :title="social.label" />
                    </a>
                </div>
                
                <!-- Label Copyright -->
                <p class="mt-4 text-xs leading-5 text-gray-500 md:order-1 md:mt-0">
                    &copy; 2023 <Link :href="copyRight.href" class="font-bold">{{copyRight.label}}</Link>, Inc. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</template>