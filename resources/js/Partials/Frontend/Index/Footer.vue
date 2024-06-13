<template>
    <footer class="bg-white rounded-lg shadow dark:bg-gray-900">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="/" class="flex items-center mb-4 sm:mb-0">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">BigRent</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <Link
                            class="mr-4 hover:underline md:mr-6"
                            :href="route('frontend.about-us')">
                            {{ __('About') }}
                        </Link>
                    </li>
<!--                    <li>-->
<!--                        <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#" class="mr-4 hover:underline md:mr-6 ">Licensing</a>-->
<!--                    </li>-->
                    <li>
                        <Link
                            class="mr-4 hover:underline md:mr-6"
                            :href="route('frontend.contacts')">
                            {{ __('Contact') }}
                        </Link>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8"/>
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ new Date().getFullYear() }} <a
                href="#" class="hover:underline">BigRent™</a>. {{ __('All rights reserved.') }}</span>
        </div>
    </footer>
</template>

<script>
import {Link} from "@inertiajs/vue3";


export default {
    components: {Link}
}
</script>

<style scoped>

</style>
