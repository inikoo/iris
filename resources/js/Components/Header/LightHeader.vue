<script setup>
import { ref, watchEffect } from 'vue';
import { router } from '@inertiajs/vue3'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faBars, faMagnifyingGlass } from "@fortawesome/free-solid-svg-icons";
import { library } from "@fortawesome/fontawesome-svg-core";
import { trans } from 'laravel-vue-i18n';
import { Link, } from '@inertiajs/vue3';
import { usePage } from "@inertiajs/vue3";

library.add(faBars, faMagnifyingGlass);

import {
  Dialog,
  DialogPanel,
  Popover,
  PopoverButton,
  PopoverGroup,
  PopoverPanel,
  Tab,
  TabGroup,
  TabList,
  TabPanel,
  TabPanels,
  TransitionChild,
  TransitionRoot,
} from '@headlessui/vue'
import { Bars3Icon, MagnifyingGlassIcon, ShoppingCartIcon, UserIcon, XMarkIcon } from '@heroicons/vue/24/outline'
import { ChevronDownIcon } from '@heroicons/vue/20/solid'

const mobileMenuOpen = ref(false)
const user = ref(usePage().props.auth.user);
router.on('success', (event) => {
  user.value = usePage().props.auth.user;
})

const navigation = {
  categories: [
    {
      name: 'Home',
      featured: [
        {
          name: 'About us',
          href: '#',
        },
        {
          name: 'Contact',
          href: '#',
        },
        {
          name: 'ShowRoom',
          href: '#',
        },
        {
          name: 'Trems & Conditions',
          href: '#',
        },
        {
          name: 'Delivery',
          href: '#',
        },
        {
          name: 'Operation Hours',
          href: '#',
        },
        {
          name: 'Freedom Fund',
          href: '#',
        },
        {
          name: 'Business Ethics',
          href: '#',
        },
        {
          name: 'Catalogue',
          href: '#',
        },
        {
          name: 'Retruns Policy',
          href: '#',
        },
        {
          name: 'Dropshiping Sevices',
          href: '#',
        },
        {
          name: 'Working with local businesses',
          href: '#',
        },
        {
          name: 'sustainable palm oil',
          href: '#',
        },
        {
          name: 'Privacy Policy',
          href: '#',
        },
        {
          name: 'Cookies Policy',
          href: '#',
        },
        {
          name: 'Travel Blog',
          href: '#',
        },
      ],
    },
    {
      name: 'Departements',
      featured: [
        {
          name: 'New Arrivals',
          href: '#',
        },
        {
          name: 'Basic Tees',
          href: '#',
        },
        {
          name: 'Accessories',
          href: '#',
        },
        {
          name: 'Carry',
          href: '#',
        },
      ],
    },
    {
      name: 'Incentives & Inspiration',
      featured: [
        {
          name: 'New Arrivals',
          href: '#',
        },
        {
          name: 'Basic Tees',
          href: '#',
        },
        {
          name: 'Accessories',
          href: '#',
        },
        {
          name: 'Carry',
          href: '#',
        },
      ],
    },
    {
      name: 'Delivery',
      featured: [
        {
          name: 'New Arrivals',
          href: '#',
        },
        {
          name: 'Basic Tees',
          href: '#',
        },
        {
          name: 'Accessories',
          href: '#',
        },
        {
          name: 'Carry',
          href: '#',
        },
      ],
    },
    {
      name: 'New & Notetable',
      featured: [
        {
          name: 'New Arrivals',
          href: '#',
        },
        {
          name: 'Basic Tees',
          href: '#',
        },
        {
          name: 'Accessories',
          href: '#',
        },
        {
          name: 'Carry',
          href: '#',
        },
      ],
    },
  ],
}

const pages = [
  { name: 'Login', href: 'login', user: false },
  { name: 'Register', href: 'register', user: false },
  { name: 'Logout', href: 'logout', user: true },
]

let filteredPages = [];
if (user.value == null) {
  filteredPages = pages.filter((item) => item.user);
} else if (user.value !== null) {
  filteredPages = pages.filter((item) => !item.user);
}
console.log(user,filteredPages)



</script>
<template>
  <div class="bg-white">
    <!-- Mobile menu -->
    <TransitionRoot as="template" :show="mobileMenuOpen">
      <Dialog as="div" class="relative z-40 lg:hidden" @close="mobileMenuOpen = false">
        <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0"
          enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100"
          leave-to="opacity-0">
          <div class="fixed inset-0 bg-black bg-opacity-25" />
        </TransitionChild>

        <div class="fixed inset-0 z-40 flex">
          <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
            enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform"
            leave-from="translate-x-0" leave-to="-translate-x-full">
            <DialogPanel class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
              <div class="flex px-4 pb-2 pt-5">
                <button type="button" class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400"
                  @click="mobileMenuOpen = false">
                  <span class="sr-only">Close menu</span>
                  <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                </button>
              </div>

              <!-- Links -->
              <TabGroup as="div" class="mt-2">
                <div class="border-b border-gray">
                  <TabList class="-mb-px flex space-x-8 px-4 w-304 overflow-x-auto">
                    <Tab as="template" v-for="category in navigation.categories" :key="category.name"
                      v-slot="{ selected }">
                      <button
                        :class="[selected ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-900', 'flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium']">{{
                          category.name }}</button>
                    </Tab>
                  </TabList>
                </div>
                <TabPanels as="template">
                  <TabPanel v-for="category in navigation.categories" :key="category.name" class="space-y-12 px-4 py-6">
                    <div class="grid grid-cols-1 gap-x-4">
                      <div v-for="item in category.featured" :key="item.name" class="group relative">

                        <a :href="item.href" class="mt-6 block text-sm font-medium text-gray-900">
                          <span class="absolute inset-0 z-10" aria-hidden="true" />
                          {{ item.name }}
                        </a>
                      </div>
                    </div>
                  </TabPanel>
                </TabPanels>
              </TabGroup>

              <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                <div v-for="page in navigation.pages" :key="page.name" class="flow-root">
                  <a :href="page.href" class="-m-2 block p-2 font-medium text-gray-900">{{ page.name }}</a>
                </div>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </Dialog>
    </TransitionRoot>

    <!-- Desktop -->
    <header class="relative z-10">
      <nav aria-label="Top">
        <!-- Top navigation -->
        <div class="bg-gray-900">

          <div class="mx-auto flex h-10  px-4 sm:px-6 lg:px-8">

            <div class="w-2/4">
              <div class="hidden lg:flex lg:flex-1 lg:items-center">
                <a href="#">
                  <div class="flex"><img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=white"
                      alt="" /><span class="p-1 text-2xl font-semibold text-white">AW GIFT</span></div>
                </a>
              </div>
            </div>

            <div class="w-2/4  flex items-center space-x-6 justify-end ">

              <div class="flex flex-1 items-center justify-end">
                <div class="flex items-center lg:ml-8">
                  <div class="flex space-x-8">
                    <div class="hidden lg:flex">
                      <a href="#" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Search</span>
                        <MagnifyingGlassIcon class="h-6 w-6" aria-hidden="true" />
                      </a>
                    </div>

                    <div class="flex">
                      <a href="#" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Account</span>
                        <UserIcon class="h-6 w-6" aria-hidden="true" />
                      </a>
                    </div>
                  </div>

                  <span class="mx-4 h-6 w-px bg-gray-200 lg:mx-6" aria-hidden="true" />

                  <div class="flow-root">
                    <a href="#" class="group -m-2 flex items-center p-2">
                      <ShoppingCartIcon class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                        aria-hidden="true" />
                      <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                      <span class="sr-only">items in cart, view bag</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Secondary navigation -->
        <div class="bg-white">
          <div class="border-b border-gray-200">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
              <div class="flex h-16 items-center justify-center">
                <!-- Logo (lg+) -->

                <div class="hidden h-full lg:flex">
                  <!-- Mega menus -->
                  <PopoverGroup class="ml-8">
                    <div class="flex h-full justify-center space-x-8">
                      <Popover v-for="(category, categoryIdx) in navigation.categories" :key="category.name" class="flex"
                        v-slot="{ open }">
                        <div class="relative flex">
                          <PopoverButton
                            :class="[open ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-700 hover:text-gray-800', 'relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out']">
                            {{ category.name }}</PopoverButton>
                        </div>

                        <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0"
                          enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150"
                          leave-from-class="opacity-100" leave-to-class="opacity-0">
                          <PopoverPanel class="absolute inset-x-0 top-full text-sm text-gray-500">
                            <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                            <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true" />

                            <div class="relative bg-white">
                              <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                                <div class="grid grid-cols-3 gap-x-8 gap-y-4 py-4">
                                  <div v-for="item in category.featured" :key="item.name" class="group relative">
                                    <a :href="item.href" class="mt-4 block font-medium text-gray-900">
                                      <span class="absolute inset-0 z-10" aria-hidden="true" />
                                      {{ item.name }}
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </PopoverPanel>
                        </transition>
                      </Popover>
                      <div v-for="page in filteredPages" :key="page.name" :href="page.href"
                        class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">
                        <Link  method="post"  :href="route(page.href)"
                          class="-m-2 block p-2 font-medium text-gray-900">
                        {{ trans(page.name) }}
                        </Link>
                      </div>

                    </div>
                  </PopoverGroup>
                </div>

                <!-- Mobile menu and search (lg-) -->
                <div class="flex flex-1 items-center lg:hidden">
                  <button type="button" class="-ml-2 rounded-md bg-white p-2 text-gray-400"
                    @click="mobileMenuOpen = true">
                    <span class="sr-only">Open menu</span>
                    <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                  </button>

                  <!-- Search -->
                  <a href="#" class="ml-2 p-2 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Search</span>
                    <MagnifyingGlassIcon class="h-6 w-6" aria-hidden="true" />
                  </a>
                </div>

                <!-- Logo (lg-) -->
                <a href="#" class="lg:hidden">
                  <span class="sr-only">Your Company</span>
                  <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" class="h-8 w-auto" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
  </div></template>
 

