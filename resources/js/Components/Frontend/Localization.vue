<template>
    <button type="button" data-dropdown-toggle="language-dropdown-menu" class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
        <img
            class="h-3.5 w-3.5 rounded-full mr-2"
            :src="selectedLocale.icon"
            :alt="selectedLocale.title" width="24" height="24">
        {{ selectedLocale.title }}
    </button>
    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700" id="language-dropdown-menu">
        <ul class="py-2 font-medium" role="none">
            <li v-for="localization in localizations">
                <a :href="route('frontend.locale', localization.value)" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                    <div class="inline-flex items-center">
                        <img
                            class="h-3.5 w-3.5 rounded-full mr-2"
                            :src="localization.icon"
                            :alt="localization.title" width="24" height="24">
                        {{ localization.title }}
                    </div>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
import englishFlag from '@/Components/Icons/Localizations/english-flag.svg'
import georgianFlag from '@/Components/Icons/Localizations/georgian-flag.svg'
import russianFlag from '@/Components/Icons/Localizations/russian-flag.svg'
import TurkishFlag from '@/Components/Icons/Localizations/turkish-flag.svg'

export default {
    data() {
        return {
            selectedLocale: null,
            localizations: [
                {
                    title: 'English (US)',
                    value: 'en',
                    icon: englishFlag
                },
                {
                    title: 'ქართული',
                    value: 'ge',
                    icon: georgianFlag
                },
                {
                    title: 'Русский',
                    value: 'ru',
                    icon: russianFlag
                },
                {
                    title: 'Türkçe',
                    value: 'tr',
                    icon: TurkishFlag
                },
            ],
        }
    },
    beforeMount() {
        this.selectedLocale = this.localizations.find(localization => localization.value === this.$page.props.locale)
    }
}
</script>
