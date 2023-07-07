<template>
    <GoogleMap style="" :center="markers[0]" :zoom="13">
        <MarkerCluster>
            <Marker v-for="(marker, i) in markers" :options="{ position: marker }" :key="i" />
        </MarkerCluster>
    </GoogleMap>
</template>

<script setup>
import { GoogleMap, Marker } from "vue3-google-map"

const markers = [
    { lat: -8.648129, lng: 115.2752319 },
    { lat: 40.689247, lng: -74.044502 },
    { lat: -8.3627585, lng: 115.1354983 },
    { lat: -4.420412, lng: 105.7550854 },
]
</script>