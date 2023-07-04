<template>
    <div>
        <component :is="component()" />
    </div>
</template>

<script setup lang="ts">
import DarkHeader from './DarkHeader.vue'
import LightHeader from './LightHeader.vue'


const props = defineProps<{
    theme: String
}>()

const component =()=> {
  if(props.theme == 'DarkHeader') return DarkHeader 
  if(props.theme == 'LightHeader') return LightHeader 
  else return DarkHeader 
}

</script>

<style scoped>

</style>