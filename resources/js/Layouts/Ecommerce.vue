<template>
    <div class="bg-white">
            <Header :theme="data.header" />

            <main class="py-5 px-10">
                <slot />
            </main>
            <Footer :theme="data.footer" />

        </div>
</template>

<script setup>
import Header from '@/Components/Header/index.vue'
import Footer from '@/Components/Footers/Footer.vue'

const data = {
    header: "DarkHeader",
    background: {
        imgSrc: '',
        imgAlt: ''
    },
    footer: "2"
}

</script>
