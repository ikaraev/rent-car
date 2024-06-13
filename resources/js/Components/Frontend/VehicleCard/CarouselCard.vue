<template>
    <div class="relative" data-carousel="static">
        <!-- Carousel wrapper -->
        <div>
            <div class="relative h-72 overflow-hidden rounded-lg cursor-pointer">

                <div v-for="(vehicleImage, index) in vehicle.images"
                     style="z-index: 0"
                     class="hidden duration-300 ease-linear"
                     :data-carousel-item="index === 0 ? 'active' : ''">
                    <img :src="vehicleImage.name"
                         class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                         alt="...">
                </div>

            </div>
        </div>
        <div @click.stop>
            <!-- Slider indicators -->
            <div class="absolute flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <button v-for="(vehicleImage, index) in vehicle.images" :key="index" type="button"
                        class="w-3 h-3 rounded-full" :aria-current="index === 0"
                        :aria-label="`Slide ${index + 1}`" :data-carousel-slide-to="index"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                    class="absolute top-0 left-0 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group- group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
            </button>
            <button type="button"
                    class="absolute top-0 right-0 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group- group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
            </button>
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
