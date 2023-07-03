<template>
    <div>
        <component :is="component[theme]" />
    </div>
</template>

<script setup lang="ts">
import HeaderTheme1 from './Headertheme1.vue'
import HeaderTheme2 from './HeaderTheme2.vue'


const props = defineProps<{
    theme: number
}>()

const user = {
  name: 'Tom Cook',
  email: 'tom@example.com',
  imageUrl:
    'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
}
const navigation = [
  { name: 'Home', href: '#', current: true },
  { name: 'Departements', href: '#', current: false },
  { name: 'Incentives & Inspiration', href: '#', current: false },
  { name: 'Delivery', href: '#', current: false },
  { name: 'New & Noteable', href: '#', current: false },
]
const userNavigation = [
  { name: 'Your Profile', href: '#' },
  { name: 'Settings', href: '#' },
  { name: 'Sign out', href: '#' },
]

const component = {
    1: HeaderTheme1, 
    2: HeaderTheme2, 
}

</script>

<style scoped>

</style>