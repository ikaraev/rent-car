<template>
    <div id="categories"></div>
    <div
        class="lg:rounded-2xl items-center text-gray-700 rounded-2xl sticky top-0 z-10 pt-4 px-4 filters-container">
        <div class="relative w-full"></div>
        <div class="relative w-full flex">

            <vue-tailwind-datepicker
                v-slot="{ value, placeholder, clear }"
                v-model="dateValue"
                :shortcuts="false"
                :formatter="formater"
                :separator="' - '"
                :placeholder="this.pickUpDateFilter.title"
                :disable-date="date => date < new Date().setHours(0, 0, 0, 0)"
            >
                <div class="flex">
                    <div class="flex-1">
                        <button aria-label="Open" type="button"
                                class="relative w-full cursor-pointer rounded-xl bg-white py-2 px-3 text-left shadow-md focus:outline-none focus-visible:border-indigo-500 text-sm md:text-lg dark:bg-gray-900">
                            <div class="flex justify-between items-center w-full">
                                <span aria-label="Open"
                                   aria-expanded="true"
                                   class="font-bold dark:text-gray-50">
                                    {{ value || placeholder }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true" class="h-6 w-6 text-blue-600 dark:text-blue-400">
                                    <path
                                        d="M5.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H6a.75.75 0 01-.75-.75V12zM6 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H6zM7.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H8a.75.75 0 01-.75-.75V12zM8 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H8zM9.25 10a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H10a.75.75 0 01-.75-.75V10zM10 11.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V12a.75.75 0 00-.75-.75H10zM9.25 14a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H10a.75.75 0 01-.75-.75V14zM12 9.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V10a.75.75 0 00-.75-.75H12zM11.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H12a.75.75 0 01-.75-.75V12zM12 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H12zM13.25 10a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H14a.75.75 0 01-.75-.75V10zM14 11.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V12a.75.75 0 00-.75-.75H14z"></path>
                                    <path fill-rule="evenodd"
                                          d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </vue-tailwind-datepicker>

            <div class="ml-2">
                <button type="button" @click="showModal = true"
                        class="block rounded-xl bg-white focus:outline-none font-medium shadow-md px-5 py-2 md:py-2.5 text-center focus:ring-blue-300 hover:bg-blue-700 hover:text-white filter_button">
                    <svg class="w-[24px] h-[24px] text-blue-600 filter_image" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7.75 4H19M7.75 4a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 4h2.25m13.5 6H19m-2.25 0a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 10h11.25m-4.5 6H19M7.75 16a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 16h2.25"/>
                    </svg>
                </button>

                <Modal v-if="showModal" :title="__('Filters')" width="sm" v-on:close="showModal = false">
                    <form>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <component
                                v-for="filter in this.filters"
                                :is="filterComponents[filter.type]"
                                :filter="filter"
                                v-model="filtersValues[filter.name]"
                            ></component>
                        </div>
                        <button @click="applyFilter" type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            {{ __('Submit') }}
                        </button>
                    </form>
                </Modal>
            </div>

        </div>
        <div class="relative w-full"></div>
    </div>
</template>

<script>
import Filters from "@/mixins/Filters.js";
import VueTailwindDatepicker from "vue-tailwind-datepicker";
import Modal from "@/Components/Frontend/Modal.vue";

export default {
    mixins: [Filters],
    components: {VueTailwindDatepicker, Modal},
    props: {
        filters: Object,
        pickUpDateFilter: Object
    },
    data() {
        return {
            dateValue: null,
            showModal: false,
            initialized: false,
            formater: {
                date: 'DD MMMM',
                month: 'MMM',
            }
        }
    },
    watch: {
        dateValue(value) {
            if (!this.initialized) {
                this.initialized = true
                return
            }
            this.filtersValues[this.pickUpDateFilter.name] = value
            const rememberedValue = this.$inertia.restore(this.pickUpDateFilter.name);

            if (rememberedValue) {
                if (rememberedValue === JSON.stringify(this.dateValue)) {
                    return
                }
                this.dateValue = value.startDate && value.endDate ? value :JSON.parse(rememberedValue)
            }

            if (value.startDate && value.endDate) {
                this.applyFilter()
            }
        }
    },
    beforeMount() {
        if (!this.$inertia.restore(this.pickUpDateFilter.name)) {
            this.dateValue = this.pickUpDateFilter.value;
        } else {
            this.initialized = true
        }
    }
}
</script>

<style scoped>
.filter_button:hover .filter_image {
    color: white;
}

.filters-container {
    display: grid;
    grid-template-columns: 1fr min(390px) 1fr;
}

@media (max-width: 767px) {
    .filters-container {
        grid-template-columns: 1fr;
    }
}
</style>
