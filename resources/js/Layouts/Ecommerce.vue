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
        <Header :theme="HeaderTheme"/>
        
        <main class="py-5 px-10">
            <slot/>
        </main>

        <Footer theme="2"/>
        
    </div>
</template>

<script setup>
import Header from '@/Components/Header/index.vue'
import Footer from '@/Components/Footers/Footer.vue'

// header = [ DarkHeader, LightHeader ]
const HeaderTheme = 'DarkHeader'

</script>
