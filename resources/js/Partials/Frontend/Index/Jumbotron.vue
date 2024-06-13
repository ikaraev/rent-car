<template>
    <section
        class="bg-center bg-no-repeat bg-[url('https://i.pinimg.com/originals/64/3a/82/643a82c5fa0b77b445c97969185e37c1.jpg')] bg-gray-700 bg-blend-multiply bg-cover">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                {{ __('Daily car rental in Georgia') }}
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                {{ __('Experience the seamless convenience of car rentals with BigRent in Georgia, ensuring efficiency and reliability for all your travel needs.') }}
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <button @click="getStarted"
                   class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800  focus:ring-blue-300 dark:focus:ring-blue-900">
                    {{ __('Get started') }}
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </button>
                <Link :href="route('frontend.about-us')"
                   class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100  focus:ring-gray-400">
                    {{ __('Learn more') }}
                </Link>
            </div>
        </div>
    </section>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    components: {Link},
    methods: {
        getStarted() {
            document.getElementById('categories').scrollIntoView({ behavior: 'smooth' })
        }
    }
}
</script>

<style scoped>

</style>
