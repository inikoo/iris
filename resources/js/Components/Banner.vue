<template>
    <div class="h-96">
        <swiper :spaceBetween="-1" :slidesPerView="1" :centeredSlides="true" :loop="true"
            :autoplay="{
                delay: data.delay,
                disableOnInteraction: false,
            }"
            :pagination="{
                clickable: true,
            }"
            :navigation="false" :modules="[Autoplay, Pagination, Navigation]" class="mySwiper">
            <SwiperSlide v-for="imgBanner in data.imgsBanner">
                <img :src="imgBanner.imageSrc" :alt="imgBanner.imageAlt" srcset="">
            </SwiperSlide>
        </swiper>
    </div>
</template>

<script setup lang="ts">
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Pagination, Navigation } from 'swiper/modules'

// Import Swiper styles
import 'swiper/css'
// import 'swiper/css/pagination';
import 'swiper/css/navigation';

const data = {
    delay: 2500,
    imgsBanner: [
        {
            imageSrc: "https://tailwindui.com/img/ecommerce-images/incentives-07-hero.jpg",
            imageAlt: "Front of men's Basic Tee in sienna",
        },
        {
            imageSrc: "https://tailwindui.com/img/ecommerce-images/product-page-01-featured-product-shot.jpg",
            imageAlt: "Lorem ipsum dolor sit amet consectetur.",
        },
        {
            imageSrc: "https://tailwindui.com/img/ecommerce-images/product-page-03-product-01.jpg",
            imageAlt: "Lorem ipsum dolor Basic Tee in sienna",
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