<template>
    <div>
        <component :is="component[theme]" />
    </div>
</template>

<script setup lang="ts">
import FooterLombok from '@/Components/Footers/FooterLombok.vue'
import FooterBali from '@/Components/Footers/FooterBali.vue'
import FooterBorneo from '@/Components/Footers/FooterBorneo.vue'

const props = defineProps<{
    theme: string
}>()

const component = {
    1: FooterLombok, 
    2: FooterBali, 
    3: FooterBorneo, 
}

</script>

<style scoped>

</style>