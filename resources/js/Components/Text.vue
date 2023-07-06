<template>
    <component :is="data.component">
        {{ data.value }}
    </component>
</template>

<script setup lang="ts">
const data = {
    component: "p",
    value: "Enjoy your best clothes with us"
}
</script>

<style scoped></style>