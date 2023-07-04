<script setup>
import { computed, ref } from 'vue'
import Quantity from '@/Components/Miscellanous/Quantity.vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faTrash,  } from "@/../private/pro-solid-svg-icons"
import { faEdit } from "@/../private/pro-regular-svg-icons"
import { library } from '@fortawesome/fontawesome-svg-core'

library.add(faTrash, faEdit )

const products = ref([
    {
        id: 1,
        name: 'Basic Tee',
        qty: 2,
        href: '#',
        price: 32.00,
        color: 'Sienna',
        inStock: true,
        size: 'Large',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-01.jpg',
        imageAlt: "Front of men's Basic Tee in sienna.",
    },
    {
        id: 2,
        name: 'Basic Tee',
        qty: 1,
        href: '#',
        price: 32.00,
        color: 'Black',
        inStock: false,
        leadTime: '3–4 weeks',
        size: 'Large',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-02.jpg',
        imageAlt: "Front of men's Basic Tee in black.",
    },
    {
        id: 3,
        name: 'Nomad Tumbler',
        qty: 2,
        href: '#',
        price: 35.00,
        color: 'White',
        inStock: true,
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-03.jpg',
        imageAlt: 'Insulated bottle with white base and black snap lid.',
    },
])

const specialInstructions = ref('')

const calcPriceItemsGross = computed(() => {
    return products.value.reduce((accumulator, currentItem) => {
        return accumulator + (currentItem.price * currentItem.qty);
        }, 0)
})

const calcDiscount = computed(() => {
    return 0
})

const calcItemsNet = computed(() => {
    return calcPriceItemsGross.value - calcDiscount.value
})

const calcCharges = computed(() => {
    return 0
})

const calcShippping = computed(() => {
    return 0
})

const calcNet = computed (() => {
    return calcItemsNet.value + calcCharges.value + calcShippping.value
})

const calcTax = computed(() => {
    return parseFloat((0.05 * calcNet.value).toFixed(2))
})

const calcTotal = computed(() => {
    return calcNet.value + calcTax.value
})
</script>


<template>
    <div class="px-4 sm:px-6 lg:px-8">
        <!-- <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Users</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title,
                    email and role.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <button type="button"
                    class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                    user</button>
            </div>
        </div> -->

        <!-- Table Cart -->
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Code
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Description
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Price
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Quantity
                                    </th>
                                    <th scope="col" class="text-center px-3 py-3.5 text-sm font-semibold text-gray-900">
                                        Amount Net
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="product in products" :key="product.email">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{ product.id }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ product.name }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ product.price }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <Quantity :product="product" />
                                    </td>
                                    <td class="text-center whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ product.price * product.qty }}</td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="#" class="text-red-300 hover:text-red-500 py-1 px-2">
                                            <FontAwesomeIcon icon="fas fa-trash" aria-hidden="true" /><span class="sr-only">, {{ product.name }}</span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="grid grid-cols-3 py-8 ">
        <div class="col-span-2 px-4 sm:px-6 lg:px-8 space-y-6">
            <!-- Delivery Address -->
            <div class="space-y-4">
                <div class="flex items-center gap-x-2">
                    <h3 class="text-2xl font-semibold text-gray-800">Delivery Address</h3>
                    <FontAwesomeIcon icon='far fa-edit' class='text-xl text-gray-400 hover:text-gray-600 cursor-pointer' aria-hidden='true' />
                </div>
                <p class="whitespace-pre-line flex flex-col text-gray-700 text-sm">
                    <span>Jl. Prof. Dr. Ida Bagus Mantra</span>
                    <span>Ketewel, Gianyar</span>
                    <span>Bali, Indonesia, 123456</span>
                </p>
            </div>
            <textarea v-model="specialInstructions" name="" id="" rows="5" placeholder="Special instructions (for example: leave safe)"
                class="focus:border-indigo-500 focus:ring-offset-0 focus:ring-inset focus:ring-2 focus:ring-indigo-500 w-10/12"
            />
        </div>
        
        <!-- Calculate Total -->
        <div class="px-4 sm:px-6 lg:px-8 ">
            <div class="flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-fit w-full divide-y divide-gray-300">
                            <!-- <thead>
                                <tr class="text-right">
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-0">
                                        Name
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-sm font-semibold text-gray-900">
                                        Title
                                    </th>
                                </tr>
                            </thead> -->
                            <tbody class="divide-y divide-gray-200 text-right">
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm font-medium text-gray-800 sm:pl-0">
                                        Item Gross
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ calcPriceItemsGross }}</td>
                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm font-medium text-gray-800 sm:pl-0">
                                        Discounts
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ calcDiscount }}</td>
                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm font-medium text-gray-800 sm:pl-0">
                                        Items Net
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ calcItemsNet }}</td>
                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm font-medium text-gray-800 sm:pl-0">
                                        Charges
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ calcCharges }}</td>
                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm font-medium text-gray-800 sm:pl-0">
                                        Shipping
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ calcShippping }}</td>
                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm font-medium text-gray-800 sm:pl-0">
                                        Net
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ calcNet }}</td>
                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm font-medium text-gray-800 sm:pl-0">
                                        <p>Tax</p>
                                        <span class="text-xs text-gray-400">Outside the scope of tax</span>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ calcTax }}</td>
                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm font-bold text-gray-800 sm:pl-0">
                                        Total
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500 font-bold">{{ calcTotal }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</template>