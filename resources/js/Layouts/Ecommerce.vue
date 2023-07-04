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
        <main>
           <slot/>
        </main>

        <Footer />
        
    </div>
</template>

<script setup>
import Header from '@/Components/Header/index.vue'
import Footer from '@/Components/Footers/Footer.vue'

// header = [ DarkHeader, LightHeader ]
const HeaderTheme = 'DarkHeader'

</script>
