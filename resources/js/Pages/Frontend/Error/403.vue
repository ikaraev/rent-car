<template>
    <FrontendLayout>
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css">

        <!-- Page Container -->
        <div class="flex items-center justify-center min-h-screen bg-white py-48">
            <div class="flex flex-col">

                <!-- Error Container -->
                <div class="flex flex-col items-center">
                    <div class="text-indigo-500 font-bold text-7xl">
                        403
                    </div>

                    <div class="font-bold text-3xl xl:text-7xl lg:text-6xl md:text-5xl mt-10">
                        {{ __('Access denied') }}
                    </div>

                    <div class="text-gray-400 font-medium text-sm md:text-xl lg:text-2xl mt-8">
                        {{ __('Oops, You don\'t have permission to access this page.') }}
                    </div>
                </div>

                <!-- Continue With -->
                <div class="flex flex-col mt-48">
                    <div class="text-gray-400 font-bold uppercase">
                        Continue With
                    </div>

                    <div class="flex flex-col items-stretch mt-5">
                        <!-- Nav Item #1 -->
                        <div class="flex flex-row group px-4 py-8
                    border-t hover:cursor-pointer
                    transition-all duration-200 delay-100">

                            <!-- Nav Icon -->
                            <div class="rounded-xl bg-blue-100 px-3 py-2 md:py-4">
                                <i class="mdi mdi-home-outline mx-auto
                            text-indigo-900 text-2xl md:text-3xl"></i>
                            </div>

                            <!-- Text -->
                            <div class="grow flex flex-col pl-5 pt-2">
                                <div class="font-bold text-sm md:text-lg lg:text-xl group-hover:underline">
                                    Home Page
                                </div>

                                <div class="font-semibold text-sm md:text-md lg:text-lg
                            text-gray-400 group-hover:text-gray-500
                            transition-all duration-200 delay-100">
                                    Everything starts here
                                </div>
                            </div>

                            <!-- Chevron -->
                            <i class="mdi mdi-chevron-right text-gray-400 mdi-24px my-auto pr-2
                        group-hover:text-gray-700 transition-all duration-200 delay-100"></i>
                        </div>

                        <!-- Nav Item #2 -->
                        <div class="flex flex-row group px-4 py-8
                    border-t hover:cursor-pointer
                    transition-all duration-200 delay-100">

                            <!-- Nav Icon -->
                            <div class="rounded-xl bg-blue-100 px-3 py-2 md:py-4">
                                <i class="mdi mdi-book-open-page-variant-outline mx-auto
                            text-indigo-800 text-2xl md:text-3xl"></i>
                            </div>

                            <!-- Text -->
                            <div class="grow flex flex-col pl-5 pt-2">
                                <div class="font-bold text-sm md:text-lg lg:text-xl group-hover:underline">
                                    Blog
                                </div>

                                <div class="font-semibold text-sm md:text-md lg:text-lg
                            text-gray-400 group-hover:text-gray-500
                            transition-all duration-200 delay-100">
                                    Read our awesome articles
                                </div>
                            </div>

                            <!-- Chevron -->
                            <i class="mdi mdi-chevron-right text-gray-400 mdi-24px my-auto pr-2
                        group-hover:text-gray-700 transition-all duration-200 delay-100"></i>
                        </div>

                        <!-- Nav Item #3 -->
                        <div class="flex flex-row group px-4 py-8
                    border-t hover:cursor-pointer
                    transition-all duration-200 delay-100">

                            <!-- Nav Icon -->
                            <div class="rounded-xl bg-blue-100 px-3 py-2 md:py-4">
                                <i class="mdi mdi-archive-settings-outline
                            mx-auto text-indigo-800 text-2xl md:text-3xl"></i>
                            </div>

                            <!-- Text -->
                            <div class="grow flex flex-col pl-5 pt-2">
                                <div class="font-bold text-sm md:text-lg lg:text-xl group-hover:underline">
                                    Archive
                                </div>

                                <div class="font-semibold text-sm md:text-md lg:text-lg
                            text-gray-400 group-hover:text-gray-500
                            transition-all duration-200 delay-100">
                                    Archived posts but still readable
                                </div>
                            </div>

                            <!-- Chevron -->
                            <i class="mdi mdi-chevron-right text-gray-400 mdi-24px my-auto pr-2
                        group-hover:text-gray-700 transition-all duration-200 delay-100"></i>
                        </div>

                        <!-- Nav Item #3 -->
                        <div class="flex flex-row group px-4 py-8
                    border-t hover:cursor-pointer
                    transition-all duration-200 delay-100">

                            <!-- Nav Icon -->
                            <div class="rounded-xl bg-blue-100 px-3 py-2 md:py-4">
                                <i class="mdi mdi-at mx-auto
                            text-indigo-800 text-2xl md:text-3xl"></i>
                            </div>

                            <!-- Text -->
                            <div class="grow flex flex-col pl-5 pt-2">
                                <div class="font-bold text-sm md:text-lg lg:text-xl group-hover:underline">
                                    Contact
                                </div>

                                <div class="font-semibold text-sm md:text-md lg:text-lg
                            text-gray-400 group-hover:text-gray-500
                            transition-all duration-200 delay-100">
                                    Contact us for your questions
                                </div>
                            </div>

                            <!-- Chevron -->
                            <i class="mdi mdi-chevron-right text-gray-400 mdi-24px my-auto pr-2
                        group-hover:text-gray-700 transition-all duration-200 delay-100"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        <ContactButton/>-->
    </FrontendLayout>
</template>

<script>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import ContactButton from "@/Partials/Frontend/Index/ContactButton.vue";

export default {
    components: {ContactButton, FrontendLayout},
}
</script>

