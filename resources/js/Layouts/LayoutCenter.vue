<template>
    <div class="relative flex place-content-center">
        <div class="-z-[99999] w-screen h-screen fixed items-center justify-center bg-red-500">
            <img :src="data.imgSrc" :alt="data.imgAlt" class="object-cover min-w-full min-h-full" />
        </div>
        <div class="max-w-5xl bg-gray-100">
            <Header :theme="HeaderTheme" />

            <main class="py-5 px-10">
                <slot />
            </main>
            <Footer theme="2" />

        </div>
    </div>
</template>

<script setup>
import Header from '@/Components/Header/index.vue'
import Footer from '@/Components/Footers/Footer.vue'

const data = {
    imgSrc: 'https://tailwindui.com/img/ecommerce-images/incentives-07-hero.jpg',
    imgAlt: 'Background Image of Page'
}

// header = [ DarkHeader, LightHeader ]
const HeaderTheme = 'DarkHeader'

</script>
