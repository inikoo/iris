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
<template>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 pb-24 pt-16 sm:px-6 lg:max-w-7xl lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl">Shopping Cart</h1>
            <form class="mt-12 lg:grid lg:grid-cols-12 lg:items-start lg:gap-x-12 xl:gap-x-16">
                <section aria-labelledby="cart-heading" class="lg:col-span-7">
                    <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>
                    <ul role="list" class="divide-y divide-gray-200 border-b">
                        <!-- Product Cart -->
                        <li v-for="(product, productIdx) in products" :key="product.id" class="flex py-6 sm:py-10">
                            <div class="flex-shrink-0">
                                <img :src="product.imageSrc" :alt="product.imageAlt"
                                    class="h-24 w-24 rounded-md object-cover object-center sm:h-48 sm:w-48" />
                            </div>

                            <div class="ml-4 flex flex-1 flex-col justify-between sm:ml-6">
                                <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                    <div>
                                        <div class="flex justify-between">
                                            <h3 class="text-sm">
                                                <a :href="product.href"
                                                    class="font-medium text-gray-700 hover:text-gray-800">{{ product.name
                                                    }}</a>
                                            </h3>
                                        </div>
                                        <div class="mt-1 flex text-sm">
                                            <p class="text-gray-500">{{ product.color }}</p>
                                            <p v-if="product.size" class="ml-4 border-l border-gray-200 pl-4 text-gray-500">
                                                {{ product.size }}</p>
                                        </div>
                                        <p class="mt-1 text-sm font-medium text-gray-800">${{ product.price }}.00</p>
                                    </div>

                                    <div class="mt-4 sm:mt-0 sm:pr-9">
                                        <label :for="`quantity-${productIdx}`" class="sr-only">
                                            Quantity, {{ product.name }}
                                        </label>
                                        <Quantity :product="product" />
                                        <!-- <select :id="`quantity-${productIdx}`" :name="`quantity-${productIdx}`"
                                            class="max-w-full rounded-md border border-gray-300 py-1.5 text-left text-base font-medium leading-5 text-gray-700 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select> -->

                                        <!-- Close Cart List -->
                                        <div class="absolute right-0 top-0">
                                            <button @click.prevent="products.splice(productIdx, 1)" type="button"
                                                class="-m-2 inline-flex p-2 text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Remove</span>
                                                <!-- <XMarkIcon class="h-5 w-5" aria-hidden="true" /> -->
                                                <FontAwesomeIcon icon='fal fa-times' class='h-5 w-5' aria-hidden='true' />
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center">
                                    <p class="flex space-x-2 text-sm text-gray-700">
                                        <CheckIcon v-if="product.inStock" class="h-5 w-5 flex-shrink-0 text-green-500"
                                            aria-hidden="true" />
                                        <ClockIcon v-else class="h-5 w-5 flex-shrink-0 text-gray-300" aria-hidden="true" />
                                        <span>{{ product.inStock ? 'In stock' : `Ships in ${product.leadTime}` }}</span>
                                    </p>
                                    <span class="text-gray-600 font-bold">
                                        ${{ product.price * product.qty}}.00
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </section>

                <!-- Order summary -->
                <section aria-labelledby="summary-heading"
                    class="mt-16 rounded-lg bg-gray-50 px-4 py-6 sm:p-6 lg:col-span-5 lg:mt-0 lg:p-8 space-y-6">
                    <h2 id="summary-heading" class="text-lg font-bold text-gray-800">Order summary</h2>

                    <dl class="divide-y divide-gray-200">
                        <div class="flex items-center justify-between py-4">
                            <dt class="text-sm text-gray-600">Items Gross</dt>
                            <dd class="text-sm font-medium text-gray-800">
                                ${{ calcPriceItemsGross }}.00
                            </dd>
                        </div>
                        <div class="flex items-center justify-between py-4">
                            <dt class="text-sm text-gray-600">Discounts</dt>
                            <dd class="text-sm font-medium text-gray-800">
                                ${{ calcDiscount }}.00
                            </dd>
                        </div>
                        <div class="flex items-center justify-between py-4">
                            <dt class="text-sm text-gray-600">Items Net</dt>
                            <dd class="text-sm font-medium text-gray-800">
                                ${{ calcItemsNet }}.00
                            </dd>
                        </div>
                        <div class="flex items-center justify-between py-4">
                            <dt class="text-sm text-gray-600">Charges</dt>
                            <dd class="text-sm font-medium text-gray-800">
                                ${{ calcCharges }}.00
                            </dd>
                        </div>
                        <div class="flex items-center justify-between py-4 pt-4">
                            <dt class="flex items-center text-sm text-gray-600">
                                <span>Shipping estimate</span>
                                <a href="#" class="ml-2 flex-shrink-0 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Learn more about how shipping is calculated</span>
                                    <QuestionMarkCircleIcon class="h-5 w-5" aria-hidden="true" />
                                </a>
                            </dt>
                            <dd class="text-sm font-medium text-gray-800">${{ calcShippping }}.00</dd>
                        </div>
                        <div class="flex items-center justify-between py-4 pt-4">
                            <dt class="flex text-sm text-gray-600">
                                <span>Tax estimate</span>
                                <a href="#" class="ml-2 flex-shrink-0 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Learn more about how tax is calculated</span>
                                    <QuestionMarkCircleIcon class="h-5 w-5" aria-hidden="true" />
                                </a>
                            </dt>
                            <dd class="text-sm font-medium text-gray-800">
                                ${{ calcTax }}
                            </dd>
                        </div>
                        <div class="flex items-center justify-between py-4 pt-4">
                            <dt class="text-base font-semibold text-gray-800">Order total</dt>
                            <dd class="text-base font-semibold text-gray-800">${{ calcTotal}}</dd>
                        </div>
                    </dl>

                    <textarea v-model="specialInstructions" name="" id="" rows="5" placeholder="Special instructions (for example: leave safe)"
                        class="focus:border-indigo-500 focus:ring-offset-0 focus:ring-inset focus:ring-1 focus:ring-indigo-500 w-full"
                    />
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full rounded-md border border-transparent bg-indigo-600 px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">Checkout</button>
                    </div>
                </section>
            </form>
        </div>
    </div>
</template>

<script setup>
import { CheckIcon, ClockIcon, QuestionMarkCircleIcon, XMarkIcon } from '@heroicons/vue/20/solid'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faTimes } from '@/../private/pro-light-svg-icons'
import { library } from '@fortawesome/fontawesome-svg-core'
library.add(faTimes)
import { computed, ref } from 'vue'
import Quantity from '@/Components/Miscellanous/Quantity.vue';

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