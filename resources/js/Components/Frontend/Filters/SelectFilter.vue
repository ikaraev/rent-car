<template>
    <div>
        <label :for="filter.name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __(filter.title) }}</label>
        <select
            :id="filter.name"
            @change="$emit('update:modelValue', $event.target.value)"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option v-for="option in filter.options" :value="option" :selected="selected(option)">{{ __(option) }}</option>
        </select>
    </div>
</template>

<script>
export default {
    props: {
        filter: Object,
        modelValue: null
    },
    methods: {
        selected(option) {
            const href = new URL(window.location.href)

            if (!href.searchParams.has('filter')) {
                return false
            }

            const filters = JSON.parse(atob(href.searchParams.get('filter')))
            let className = ''

            const selectFilter = filters.find(filter => {
                className = Object.keys(filter)[0]
                return filter[className].name === this.filter.name
            })

            if (selectFilter) {
                return option === selectFilter[className].value
            }

            return false
        }
    }
}
</script>

<style scoped>

</style>
