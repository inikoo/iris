<script setup lang="ts">
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { v4 as uuidv4 } from 'uuid'

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

console.log(navigations.value.find(obj => obj.type === 'list').data)
</script>

<template>
    <footer class="bg-slate-800">
        <div class="mx-auto max-w-7xl overflow-hidden px-6 py-20 sm:py-24 lg:px-8">
            <!-- Navigations -->
            <nav class="grid grid-cols-2 text-gray-100 sm:flex sm:justify-center sm:space-x-12" aria-label="Footer">
                <!-- Find the first object who have property type === 'list' -->
                <div v-for="navigation in navigations.find(obj => obj.type === 'list').data" :key="navigation.title" class="flex justify-center sm:inline pb-6">
                    <a :href="navigation.href" class="px-4 sm:px-0 text-sm leading-6 hover:text-gray-400">{{ navigation.name }}</a>
                </div>
            </nav>

            <!-- Social Media -->
            <div class="mt-10 flex justify-center gap-x-10">
                <a v-for="social in socials" :key="social.id" :href="social.href"
                    class="text-gray-400 hover:text-gray-100" :title="social.label">
                    <span class="sr-only">{{ social.label }}</span>
                    <FontAwesomeIcon :icon="social.icon" class="h-6 w-6" aria-hidden="true" />
                </a>
            </div>

            <!-- Copyright -->
            <p class="mt-10 text-center text-xs leading-5 text-gray-500">
                &copy; 2023 <Link :href="copyRight.href" class="font-bold text-gray-400">{{ copyRight.label }}</Link>, Inc. All rights reserved.
            </p>
        </div>
    </footer>
</template>