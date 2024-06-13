<template>
    <article
        @click="$emit('openVehicleModal', vehicle)"
        class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl cursor-pointer">
        <SimpleCard v-if="this.vehicle.images.length <= 1" :vehicle="vehicle" />
        <CarouselCard v-if="this.vehicle.images.length > 1" :vehicle="vehicle" />
        <CardInfo :vehicle="vehicle" />
    </article>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import SimpleCard from "@/Components/Frontend/VehicleCard/SimpleCard.vue";
import CarouselCard from "@/Components/Frontend/VehicleCard/CarouselCard.vue";
import CardInfo from "@/Components/Frontend/VehicleCard/CardInfo.vue";

export default {
    components: {CardInfo, CarouselCard, SimpleCard, Link},
    props: {
        vehicle: Object
    }
}
</script>

<style scoped>

</style>
