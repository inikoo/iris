<template>
    <div>
        <component :is="component[theme]" />
    </div>
</template>

<script setup lang="ts">
import BasketCompact from '@/Components/Baskets/BasketCompact.vue'
import BasketStyle from '@/Components/Baskets/BasketStyle.vue'

const props = defineProps<{
    theme: number
}>()

const component = {
    1: BasketCompact, 
    2: BasketStyle,
}

</script>

<style scoped>

</style>