<template>
    <div class="h-6 flex gap-x-1">
        <button @click.prevent="!!product.qty ? product.qty = product.qty - 1 : ''"
            :class="[product.qty === 0 ? 'text-gray-300 cursor-not-allowed' : 'text-indigo-700 cursor-pointer', 'rounded px-2 ']">-</button>
        <div class="flex items-center justify-center px-3 border-b border-indigo-500 text-gray-600 select-none text-sm">
            {{ product.qty }}</div>
        <button @click.prevent="product.qty = product.qty + 1"
            class="rounded px-2 cursor-pointer text-indigo-700">+</button>
    </div>
</template>

<script setup lang="ts">
const props = defineProps<{
    product: {
        qty: number
    }
}>()
</script>

<style scoped></style>