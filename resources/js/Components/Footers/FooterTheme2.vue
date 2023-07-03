<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<script setup>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faFacebook, faInstagram, faTwitter, faGithub, faYoutube } from "@fortawesome/free-brands-svg-icons"
import { library } from '@fortawesome/fontawesome-svg-core'
library.add(faFacebook, faInstagram, faTwitter, faGithub, faYoutube)


const navigations = [
    {
        title: 'solutions',
        data: [
            { name: 'Marketing', href: '#' },
            { name: 'Analytics', href: '#' },
            { name: 'Commerce', href: '#' },
            { name: 'Insights', href: '#' },
        ],
    },
    {
        title: 'support',
        data: [
            { name: 'Pricing', href: '#' },
            { name: 'Documentation', href: '#' },
            { name: 'Guides', href: '#' },
            { name: 'API Status', href: '#' },
        ],
    },
    {
        title: 'company',
        data: [
            { name: 'About', href: '#' },
            { name: 'Blog', href: '#' },
            { name: 'Jobs', href: '#' },
            { name: 'Press', href: '#' },
            { name: 'Partners', href: '#' },
        ],
    },
    {
        title: 'legal',
        data: [
            { name: 'Claim', href: '#' },
            { name: 'Privacy', href: '#' },
            { name: 'Terms', href: '#' },
        ],
    },
]

const socials = [
    {
        title: "Facebook",
        href: '#facebook',
        icon: ['fab', 'fa-facebook'],
    },
    {
        title: "Instagram",
        href: '#instagram',
        icon: ['fab', 'fa-instagram'],
    },
    {
        title: "Twitter",
        href: '#twitter',
        icon: ['fab', 'fa-twitter'],
    },
    {
        title: "Github",
        href: '#github',
        icon: ['fab', 'fa-github'],
    },
]
</script>

<template>
    <footer class="bg-gray-50 px-6" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl px-6 pb-8 pt-20 sm:pt-24 lg:px-8 lg:pt-24">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="flex gap-8 xl:col-span-2">
                    <div class="flex grow justify-between xl:pr-24">
                        <!-- Navigations -->
                        <div v-for="navigation in navigations">
                            <h3 class="text-sm font-bold leading-6 text-gray-700 capitalize">{{ navigation.title }}</h3>
                            <ul role="list" class="mt-6 space-y-3">
                                <li v-for="item in navigation.data" :key="item.name">
                                    <a :href="item.href" class="text-sm leading-6 text-gray-600 hover:text-indigo-500">
                                        {{ item.name }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Group: Newsletter -->
                <div class="mt-12 xl:mt-0">
                    <h3 class="text-sm font-semibold leading-6 text-gray-700">Subscribe to our newsletter</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-600">
                        The latest news, articles, and resources, sent to your inbox weekly.
                    </p>
                    <form class="mt-6 sm:flex sm:max-w-md">
                        <label for="email-address" class="sr-only">Email address</label>
                        <input type="email" name="email-address" id="email-address" autocomplete="email" required=""
                            class="w-full min-w-0 appearance-none rounded-md border-0 bg-white px-3 py-1.5 text-base text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:w-64 sm:text-sm sm:leading-6 xl:w-full"
                            placeholder="Enter your email" />
                        <div class="mt-4 sm:ml-4 sm:mt-0 sm:flex-shrink-0">
                            <button type="submit"
                                class="flex w-full items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Social Media -->
            <div class="border-t border-gray-900/10 pt-8 sm:mt-10 flex flex-col md:flex-row items-center justify-between mt-16 lg:mt-18">
                <div class="flex space-x-6 md:order-2">
                    <a v-for="social in socials" :key="social.name" :href="social.href"
                        class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">{{ social.title }}</span>
                        <FontAwesomeIcon :icon="social.icon" class="h-6 w-6" aria-hidden="true" />
                    </a>
                </div>
                <p class="mt-4 text-xs leading-5 text-gray-500 md:order-1 md:mt-0">
                    &copy; 2023 <span class="font-bold">AW Advantage</span>, Inc. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</template>