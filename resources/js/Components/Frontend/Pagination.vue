<template>
    <div class="flex pt-5" v-if="items.prev_page_url || items.next_page_url">
        <Link :href="items.prev_page_url" :onBefore="this.scrollToElement" preserveScroll class="flex items-center justify-center px-3 h-8 mr-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
            </svg>
            {{ __('Previous') }}
        </Link>
        <Link :href="items.next_page_url" :onBefore="this.scrollToElement" preserveScroll class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            {{ __('Next') }}
            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </Link>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: {
        items: Object,
        scrollTo: Object,
    },
    methods: {
        scrollToElement() {
            this.scrollTo.scrollIntoView({ behavior: 'smooth' })
        }
    }
}
</script>
