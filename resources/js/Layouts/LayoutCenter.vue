<template>
    <div class="relative flex place-content-center">
        <div class="-z-[99999] w-screen h-screen fixed items-center justify-center bg-red-500">
            <img :src="data.imgSrc" :alt="data.imgAlt" class="object-cover min-w-full min-h-full" />
        </div>
        <div class="max-w-5xl bg-gray-100">
            <Header :theme="data.header" />

            <main class="py-5 px-10">
                <slot />
            </main>
            <Footer :theme="data.footer" />

        </div>
    </div>
</template>

<script setup>
import Header from '@/Components/Header/index.vue'
import Footer from '@/Components/Footers/Footer.vue'

import { fab } from "@fortawesome/free-brands-svg-icons"
import { fas } from '@/../private/pro-solid-svg-icons'
import { far } from '@/../private/pro-regular-svg-icons'
import { fal } from '@/../private/pro-light-svg-icons'
import { library } from '@fortawesome/fontawesome-svg-core'
library.add(fas, fab, far, fal)

const data = {
    header: "LightHeader",
    background: {
        imgSrc: 'https://tailwindui.com/img/ecommerce-images/incentives-07-hero.jpg',
        imgAlt: 'Background Image of Page'
    },
    footer: "3"
}


</script>
