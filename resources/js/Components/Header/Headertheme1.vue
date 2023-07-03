<script setup>
 import { ref } from 'vue'
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
 import { ChevronDownIcon } from '@heroicons/vue/20/solid'
 import {trans} from 'laravel-vue-i18n';
 import { Link, } from '@inertiajs/vue3';
 import { usePage } from "@inertiajs/vue3";
 const currencies = ['CAD', 'USD', 'AUD', 'EUR', 'GBP']
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
 
 const user = ref(usePage().props.auth.user);
 
 const mobileMenuOpen = ref(false)
 </script>
<template>
   <TransitionRoot as="template" :show="mobileMenuOpen">
      <Dialog as="div" class="relative z-40 lg:hidden" @close="mobileMenuOpen = false">
        <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
          <div class="fixed inset-0 bg-black bg-opacity-25" />
        </TransitionChild>

        <div class="fixed inset-0 z-40 flex">
          <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
            <DialogPanel class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
              <div class="flex px-4 pb-2 pt-5">
                <button type="button" class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400" @click="mobileMenuOpen = false">
                  <span class="sr-only">Close menu</span>
                  <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                </button>
              </div>

              <!-- Links -->
              <TabGroup as="div" class="mt-2">
                <div class="border-b border-gray-200">
                  <TabList class="-mb-px flex space-x-8 px-4">
                    <Tab as="template" v-for="category in navigation.categories" :key="category.name" v-slot="{ selected }">
                      <button :class="[selected ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-900', 'flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium']">{{ category.name }}</button>
                    </Tab>
                  </TabList>
                </div>
                <TabPanels as="template">
                  <TabPanel v-for="category in navigation.categories" :key="category.name" class="space-y-12 px-4 py-6">
                    <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                      <div v-for="item in category.featured" :key="item.name" class="group relative">
                        <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                          <img :src="item.imageSrc" :alt="item.imageAlt" class="object-cover object-center" />
                        </div>
                        <a :href="item.href" class="mt-6 block text-sm font-medium text-gray-900">
                          <span class="absolute inset-0 z-10" aria-hidden="true" />
                          {{ item.name }}
                        </a>
                        <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
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

              <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                <div class="flow-root">
                  <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Create an account</a>
                </div>
                <div class="flow-root">
                  <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
                </div>
              </div>

             
            </DialogPanel>
          </TransitionChild>
        </div>
      </Dialog>
    </TransitionRoot>

    <!-- Hero section -->
    <div class="relative bg-gray-900">
       <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-50" />
 
       <!-- Navigation -->
       <header class="relative z-10">
         <nav aria-label="Top">
           <!-- Top navigation -->
           <div class="bg-gray-900">
             <div class="mx-auto flex h-10  items-center justify-between px-4 sm:px-6 lg:px-8">
             
                 <div>
                  <div class="hidden lg:flex lg:flex-1 lg:items-center">
                     <a href="#">
                       <span class="sr-only">Your Company</span>
                       <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="" />
                     </a>
                   </div>
                 </div>
       
 
               <div class="flex items-center space-x-6">
                 <Link v-if="user == null" :href="route('login')" class="text-sm font-medium text-white hover:text-gray-100">{{trans('Login')}}</Link>
                <Link  v-if="user"  method="post" :href="route('logout')" class="text-sm font-medium text-white hover:text-gray-100">{{trans('Logout')}}</Link>
                 <!-- <a href="#" class="text-sm font-medium text-white hover:text-gray-100">Register</a> -->
               </div>
             </div>
           </div>
 
           <!-- Secondary navigation -->
           <div class="bg-white bg-opacity-10 backdrop-blur-md backdrop-filter">
             <div class="mx-auto  px-4 sm:px-6 lg:px-4">
               <div>
                 <div class="flex h-16 items-center justify-between">
 
                   <div class="hidden h-full lg:flex">
                     <!-- Flyout menus -->
                     <PopoverGroup class="inset-x-0 bottom-0 px-4">
                       <div class="flex h-full justify-center space-x-8">
                         <Popover v-for="category in navigation.categories" :key="category.name" class="flex" v-slot="{ open }">
                           <div class="relative flex">
                             <PopoverButton class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out">
                               {{ category.name }}
                               <span :class="[open ? 'bg-white' : '', 'absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out']" aria-hidden="true" />
                             </PopoverButton>
                           </div>
 
                           <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100" leave-to-class="opacity-0">
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
 
                         <a v-for="page in navigation.pages" :key="page.name" :href="page.href" class="flex items-center text-sm font-medium text-white">{{ page.name }}</a>
                       </div>
                     </PopoverGroup>
                   </div>
 
                   <!-- Mobile menu and search (lg-) -->
                   <div class="flex flex-1 items-center lg:hidden">
                     <button type="button" class="-ml-2 p-2 text-white" @click="mobileMenuOpen = true">
                       <span class="sr-only">Open menu</span>
                       +
                     </button>
 
                     <!-- Search -->
                     <a href="#" class="ml-2 p-2 text-white">
                       <span class="sr-only">Search</span>
                       ---
                     </a>
                   </div>
 
                   <!-- Logo (lg-) -->
                   <a href="#" class="lg:hidden">
                     <span class="sr-only">Your Company</span>
                     <img src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="" class="h-8 w-auto" />
                   </a>
 
                   <div class="flex flex-1 items-center justify-end">
                     <a href="#" class="hidden text-sm font-medium text-white lg:block">Search</a>
 
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </nav>
       </header>
     </div>

 </template>
 
 
 