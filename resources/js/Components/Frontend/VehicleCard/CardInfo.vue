<template>
    <div class="mt-1 p-2">
        <h2 class="text-slate-700">{{ vehicle.name }}</h2>
        <p class="text-slate-400 mt-1 text-sm">{{ __(vehicle.gear_box) }}</p>
        <div class="mt-3 flex items-end justify-between">
            <p>
                <del class="text-slate-400 text-sm mr-1" v-if="this.getDiscount()">${{ vehicle.rent_price }}</del>
                <span class="text-lg font-bold text-slate-700">${{ this.getDiscount() || vehicle.rent_price }}</span>
                <span class="text-slate-400 text-sm">/{{ __('day') }}</span>
            </p>
            <p>
                <span class="text-lg text-slate-400">${{ this.getTotalPrice() }}</span>
                <span class="text-slate-400">{{ ' ' + __('total') }} </span>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        vehicle: Object
    },
    methods: {
        getBookingInfo() {
            return this.vehicle.booking ? this.vehicle.booking : null;
        },
        getDiscount() {
            return this.getBookingInfo() && this.getBookingInfo().discount ? this.getBookingInfo().discount : null;
        },
        getTotalPrice() {
            return this.getBookingInfo() ? this.getBookingInfo().total_price : this.vehicle.total_price;
        }
    }
}
</script>

<style scoped>

</style>
