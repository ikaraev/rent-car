<template>
    <FrontendLayout>
        <Jumbotron/>
        <Filters :filters="this.filters" :pickUpDateFilter="this.pickUpDateFilter"/>
        <Vehicles
            :vehicles="this.vehicles"
            :isVehicleOpened="isVehicleOpened"
            :openedVehicleProp="openedVehicle"
        />
<!--        <ContactButton/>-->
    </FrontendLayout>
</template>

<script>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import Jumbotron from "@/Partials/Frontend/Index/Jumbotron.vue";
import Filters from "@/Partials/Frontend/Index/Filters.vue";
import ContactButton from "@/Partials/Frontend/Index/ContactButton.vue";
import Vehicles from "@/Partials/Frontend/Index/Vehicles.vue";

export default {
    components: {Vehicles, ContactButton, Filters, Jumbotron, FrontendLayout},
    props: {
        vehicles: {
            type: Object,
            required: true,
        },
        filters: {
            type: Object,
            required: true,
        },
        pickUpDateFilter: {
            type: Object,
            required: true,
        },
        isVehicleOpened: {
            type: Boolean,
        },
        openedVehicle: {
            type: Object
        }
    }
}

</script>
<style>

</style>
