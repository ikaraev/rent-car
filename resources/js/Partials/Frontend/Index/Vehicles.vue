<template>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-8">
            <div class="grid lg:grid-cols-4 gap-8 md:grid-cols-3">
                <div v-for="vehicle in this.vehicles.items">
                    <VehicleCard :vehicle="vehicle" @openVehicleModal="openVehicleModal" />
                </div>
            </div>
            <Pagination :items="this.vehicles.data" :scrollTo="categoriesElement"/>
        </div>
        <VehicleModal v-if="isVehicleOpened" :vehicle="this.openedVehicle" @closeVehicleModal="closeVehicleModal"/>
    </section>
</template>

<script>
import Pagination from "@/Components/Frontend/Pagination.vue";
import {Link} from "@inertiajs/vue3";
import VehicleCard from "@/Components/Frontend/VehicleCard/VehicleCard.vue";
import VehicleModal from "@/Pages/Frontend/VehicleModal.vue";

export default {
    components: {VehicleModal, VehicleCard, Pagination, Link},
    props: {
        vehicles: Object,
        isVehicleOpened: Boolean,
        openedVehicleProp: Object,
    },
    data() {
        return {
            isVehicleOpened: this.isVehicleOpened,
            openedVehicle: this.openedVehicleProp
        }
    },
    computed: {
        categoriesElement() {
            return document.getElementById('categories')
        },
        queryParams() {
            const urlSearchParams = new URLSearchParams(window.location.search);
            const params = Object.fromEntries(urlSearchParams.entries());
            return Object.keys(params).map(key => key + '=' + params[key]).join('&');
        }
    },
    methods: {
        openVehicleModal(vehicle) {
            this.openedVehicle = vehicle
            window.history.replaceState(window.history.state, vehicle.name, `/vehicle/${vehicle.url_rewrite}?${this.queryParams}`)
            this.isVehicleOpened = true
        },
        closeVehicleModal() {
            this.openedVehicle = null
            window.history.replaceState(window.history.state, null, `/?${this.queryParams}`)
            this.isVehicleOpened = false
        }
    }
}
</script>

<style scoped>

</style>
