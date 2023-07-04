<template>
    <div>
        <component :is="component()" />
    </div>
</template>

<script setup lang="ts">
import DarkHeader from './DarkHeader.vue'
import LightHeader from './LightHeader.vue'
import { userStore } from '@/Stores/User.js'
import { ref } from 'vue';
import { router, usePage } from '@inertiajs/vue3'

const props = defineProps<{
  theme: string;
}>();

const userS = userStore();
const user = ref(usePage().props.auth.user);

router.on('success', (event) => {
  user.value = usePage().props.auth.user;
});

if (user.value !== null) {
    for(const s in user.value){
        userS[s] = user.value[s]; 
    }
}

const component =()=> {
  if(props.theme == 'DarkHeader') return DarkHeader 
  if(props.theme == 'LightHeader') return LightHeader 
  else return DarkHeader 
}

</script>
