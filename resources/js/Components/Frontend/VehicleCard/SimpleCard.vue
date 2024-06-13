<template>
    <div class="relative">
        <div>
            <div class="relative h-72 overflow-hidden rounded-lg cursor-pointer">
                <div v-for="(vehicleImage) in vehicle.images">
                    <img :src="vehicleImage.name"
                         class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                         alt="...">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    components: {Link},
    props: {
        vehicle: Object
    }
}
</script>

<style scoped>

</style>
