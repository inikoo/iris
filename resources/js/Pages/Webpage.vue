<!--
  -  Author: Raul Perusquia <raul@inikoo.com>
  -  Created: Sun, 16 Oct 2022 18:25:10 British Summer Time, Sheffield, UK
  -  Copyright (c) 2022, Raul A Perusquia Flores
  -->

<script setup>
import Baskets from '@/Components/Baskets/Baskets.vue'
import Banner from '@/Components/Banner.vue'
import Text from '@/Components/Text.vue'
import Picture from '@/Components/Picture.vue'
import Maps from '@/Components/Maps.vue'
</script>

<template layout="LayoutCenter">
    <Banner />
    <Text class="text-2xl text-gray-700 font-bold mt-4 capitalize"/>
    <Picture class="w-20 h-auto" />
    <Maps class="w-full h-96" />
    <Baskets theme="1"/>
</template>
