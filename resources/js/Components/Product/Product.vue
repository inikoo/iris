<template>
    <div>
        <component :is="component[theme]" />
    </div>
</template>

<script setup lang="ts">
import ProductTheme1 from '@/Components/Product/ProductTheme1.vue'
import ProductTheme2 from '@/Components/Product/ProductTheme2.vue'
import ProductTheme3 from '@/Components/Product/ProductTheme3.vue'

const props = defineProps<{
    theme: string
}>()

const component = {
    1: ProductTheme1, 
    2: ProductTheme2, 
    3: ProductTheme3, 
}

</script>

<style scoped>

</style>