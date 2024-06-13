import InputFilter from "@/Components/Frontend/Filters/InputFilter.vue";
import SelectFilter from "@/Components/Frontend/Filters/SelectFilter.vue";
import RangeFilter from "@/Components/Frontend/Filters/RangeFilter.vue";
import { router } from '@inertiajs/vue3'

export default {
    data() {
        return {
            filterComponents: {
                input: InputFilter,
                select: SelectFilter,
                range: RangeFilter,
                search: InputFilter,
            },
            filtersValues: []
        }
    },
    methods: {
        applyFilter(event) {
            const filters = []
            for (const [key, value] of Object.entries(this.filtersValues)) {
                const filter = this.filters.find(filter => filter.name === key)

                if (filter) {
                    filters.push({
                        [filter.class]: {
                            name: filter.name,
                            value: value,
                            reference: filter.reference
                        }
                    })
                }
            }
            const encodedFilter = btoa(JSON.stringify(filters))
            router.get(route('frontend.index') + `/?filter=${encodedFilter}`, {}, {
                preserveScroll: true,
                onBefore: () => document.getElementById('categories').scrollIntoView({ behavior: 'smooth' })
            })
        }
    },
    beforeMount() {
        this.filters.push(this.pickUpDateFilter)
        const href = new URL(window.location.href)

        if (href.searchParams.has('filter')) {
            const filters = JSON.parse(atob(href.searchParams.get('filter')))
            filters.forEach(filter => {
                const className = Object.keys(filter)[0]
                this.filtersValues[filter[className].name] = filter[className].value
            })
        }
    },
    beforeUnmount() {
        for (const [key, value] of Object.entries(this.filtersValues)) {
            this.$inertia.remember(JSON.stringify(value), key)
        }
    }
}
