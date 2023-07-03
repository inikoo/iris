<!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
<template>
    <div class="bg-white">
        <Header />
        <main>
            <slot />
        </main>

        <FooterTheme2 />

    </div>
</template>

<script setup>
import Header from './Header/HeaderOne.vue'
import FooterTheme2 from '@/Components/Footers/FooterTheme2.vue'
</script>
