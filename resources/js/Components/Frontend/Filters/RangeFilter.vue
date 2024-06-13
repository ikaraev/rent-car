<template>
    <div>
        <label :for="filter.name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __(filter.title) }}</label>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <input
               type="text"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               @input="$emit('update:modelValue', { min: $event.target.value, max: modelValue ? modelValue.max : '' })"
               :value="modelValue ? modelValue.min : ''"
               :id="filter.name"
               :placeholder="__(filter.title)"
            >
            <input
                type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                @input="$emit('update:modelValue', { min: modelValue ? modelValue.min : '', max: $event.target.value })"
                :value="modelValue ? modelValue.max : ''"
                :id="filter.name"
                :placeholder="__(filter.title)"
            >
        </div>
    </div>
</template>

<script>
export default {
    props: {
        filter: Object,
        modelValue: null
    }
}
</script>

<style scoped>

</style>
