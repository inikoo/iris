<template>
    <div class="h-96">
        <Swiper :spaceBetween="-1" :slidesPerView="1" :centeredSlides="true" :loop="true"
            :autoplay="{
                delay: data.delay,
                disableOnInteraction: false,
            }"
            :pagination="{
                clickable: true,
            }"
            :navigation="false" :modules="[Autoplay, Pagination, Navigation]" class="mySwiper">
            <SwiperSlide v-for="imgBanner in data.slides">
                <img :src="imgBanner.imageSrc" :alt="imgBanner.imageAlt" srcset="">
                <Link v-if="imgBanner.link" :href="imgBanner.link.target" class="bg-gray-800/40 text-gray-100 border border-gray-50/50 absolute bottom-6 right-11 rounded px-3 py-1 hover:bg-gray-900/60">
                    {{imgBanner.link.label}}
                </Link>
            </SwiperSlide>
        </Swiper>
    </div>
</template>

<script setup lang="ts">
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Link } from "@inertiajs/vue3"
import { Autoplay, Pagination, Navigation } from 'swiper/modules'

// Import Swiper styles
import 'swiper/css'
// import 'swiper/css/pagination';
import 'swiper/css/navigation';

const data = {
    delay: 2500,
    slides: [
        {
            imageSrc: "https://tailwindui.com/img/ecommerce-images/incentives-07-hero.jpg",
            imageAlt: "Front of men's Basic Tee in sienna",
            link: {
                label: "Open",
                target: "#"
            }
        },
        {
            imageSrc: "https://tailwindui.com/img/ecommerce-images/product-page-01-featured-product-shot.jpg",
            imageAlt: "Lorem ipsum dolor sit amet consectetur.",
        },
        {
            imageSrc: "https://tailwindui.com/img/ecommerce-images/product-page-03-product-01.jpg",
            imageAlt: "Lorem ipsum dolor Basic Tee in sienna",
            link: {
                label: "Browse Promo",
                target: "#"
            }
        },
        {
            imageSrc: "https://tailwindui.com/img/ecommerce-images/product-page-05-product-01.jpg",
            imageAlt: "Continuous infinite slider",
        },
    ]
}


</script>

<style lang="scss">
.swiper {
    @apply w-full h-full;
}

.swiper-slide {
    @apply bg-white;
    text-align: center;
    font-size: 18px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.swiper-slide img {
    @apply w-full h-full;
    display: block;
    object-fit: cover;
}
</style>