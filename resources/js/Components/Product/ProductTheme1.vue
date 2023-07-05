<script setup lang="ts">
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faFilePdf } from '@/../private/pro-solid-svg-icons'
import { faCartPlus } from '@/../private/pro-regular-svg-icons'
import { library } from '@fortawesome/fontawesome-svg-core'
library.add(faCartPlus, faFilePdf)
</script>

<template>
    <div class="grid grid-cols-4 grid-flow-col gap-x-4">
        <!-- Left Menu -->
        <div>
            <div>
                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-01.jpg" alt="">
            </div>
            <div class="bg-gray-200 flex gap-x-2 ">
                <div class="flex h-24 w-24 place-items-center cursor-pointer">
                    <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-01.jpg" class="" alt="">
                </div>
                <div class="flex h-24 w-24 place-items-center cursor-pointer">
                    <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-01.jpg" class="" alt="">
                </div>
                <div class="flex h-24 w-24 place-items-center cursor-pointer">
                    <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-01.jpg" class="" alt="">
                </div>
                <div class="flex h-24 w-24 place-items-center cursor-pointer">
                    <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-01.jpg" class="" alt="">
                </div>
                
            </div>
        </div>

        <!-- Middle Menu -->
        <div class="pt-4 col-span-2 text-gray-600 pl-6 pr-8">
            <div class="capitalize text-2xl font-serif">16x Peppermint & Tea Tree Bath Bomb</div>
            <div class="flex gap-x-5 italic text-gray-500 text-xs">
                <p class="font-light"><span class="font-semibold">67</span> items sold</p>
                <p class="font-light"><span class="font-semibold">213</span> people liked</p>
            </div>
            <div class="flex mt-4 justify-between">
                <div class="">
                    <p class="text-4xl text-indigo-700 font-bold"><span class="text-lg">$</span>20.40<span class="ml-1 font-light text-xs text-gray-600">($1.28/Ball)</span></p>
                    
                    <!-- <p class="italic text-xs font-light">RRP: $3.75/Ball</p> -->
                </div>

            </div>
            <div class="mt-4 space-y-4 text-sm">
                <p class="whitespace-pre-line">
                    Come alive with a fresh blast of zingy peppermint and drop of tea tree. Peppermint & Tea Tree Bath Bombs
                    are also great value. Each ball weighs in at a massive 180+ grams and contains Shea Butter to make them
                    smoother on your skin.
                </p>
                <p class="">
                    We have a range of fantastic fragrances to choose from, each in their own
                    distinctive colour. Mix several different outers to make an eye catching display in your shop that your
                    customers will not be able to resist.
                </p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem sunt aliquid beatae omnis a voluptates!</p>
                <p>Enjoy the product :)</p>
            </div>
            <div class="flex items-center mt-4">
                <div
                    class="bg-indigo-700  w-full flex justify-center items-center px-3 py-3 rounded-md text-white gap-x-2 cursor-pointer hover:bg-indigo-600">
                    <FontAwesomeIcon icon='far fa-cart-plus' class='text-xl' aria-hidden='true' />
                    Add to Cart
                </div>
            </div>
        </div>

        <!-- Right Menu -->
        <div class="bg-indigo-50 rounded py-1 px-2 flex flex-col justify-center">
            <table class="divide-y divide-gray-300 flex justify-center">
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
                <tbody class="divide-y divide-gray-200 text-right text-sm">
                    <tr>
                        <td class="py-2 pl-4 pr-3 font-medium text-gray-800 sm:pl-0">
                            Code
                        </td>
                        <td class="px-3 py-2 text-gray-500 text-left">JBB-01</td>
                    </tr>
                    <tr>
                        <td class="py-2 pl-4 pr-3 font-medium text-gray-800 sm:pl-0">
                            Origin
                        </td>
                        <td class="px-3 py-2 text-gray-500 text-left"> United Kingdom</td>
                    </tr>
                    <tr>
                        <td class="py-2 pl-4 pr-3 font-medium text-gray-800 sm:pl-0">
                            Net weight
                        </td>
                        <td class="px-3 py-2 text-gray-500 text-left"> 0.18Kg /Ball</td>
                    </tr>
                    <tr>
                        <td class="py-2 pl-4 pr-3 font-medium text-gray-800 sm:pl-0">
                            Shipping weight
                        </td>
                        <td class="px-3 py-2 text-gray-500 text-left">3.357Kg</td>
                    </tr>
                    <tr>
                        <td class="py-2 pl-4 pr-3 font-medium text-gray-800 sm:pl-0">
                            Dimensions
                        </td>
                        <td class="px-3 py-2 text-gray-500 text-left">Diameter 7.5cm, 0.221L,
                            0.8Kg/L</td>
                    </tr>
                    <tr>
                        <td class="py-2 pl-4 pr-3 font-medium text-gray-800 sm:pl-0">
                            Materials / Ingredients
                        </td>
                        <td class="px-3 py-2 text-gray-500 text-left">Sodium Bicarbonate, Citric Acid, Aqua, Sodium
                            Chloride, Butyrospermum Parkii, Melaleuca Alternifolia Oil, Mentha Arvensis Oil, CI
                            19140, CI 42090</td>
                    </tr>
                    <tr>
                        <td class="py-2 pl-4 pr-3 font-medium text-gray-800 sm:pl-0">
                            CPNP
                        </td>
                        <td class="px-3 py-2 text-gray-500 text-left">3571353</td>
                    </tr>
                    <tr>
                        <td class="py-2 pl-4 pr-3 font-medium text-gray-800 sm:pl-0">
                            Barcode
                        </td>
                        <td class="px-3 py-2 text-gray-500 text-left">5055796503520</td>
                    </tr>
                </tbody>
            </table>
            <div class="pt-3 pb-2 border-t border-gray-200 flex gap-x-2 justify-center ">
                <div class="group select-none bg-transparent px-2 py-0.5 cursor-pointer flex items-center justify-center gap-x-1.5 text-xs border  border-gray-400 rounded text-gray-600 hover:bg-yellow-300 active:bg-yellow-400">
                    <FontAwesomeIcon icon='fas fa-file-pdf' class='text-red-500' aria-hidden='true' />
                    <span class="">Materials/ingredients</span>
                </div>
                <div class="group select-none bg-transparent px-2 py-0.5 cursor-pointer flex items-center justify-center gap-x-1.5 text-xs border border-gray-400 rounded text-gray-600 hover:bg-yellow-300 active:bg-yellow-400">
                    <FontAwesomeIcon icon='fas fa-file-pdf' class='text-red-500' aria-hidden='true' />
                    <span class="">Barcode</span>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>