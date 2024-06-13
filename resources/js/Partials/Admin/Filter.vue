<template>
    <div class="mB-30" v-show="filter">
        <form>
            <div class="row">
                <component v-for="filter in filter.filters"
                           :is="imputeComponents[filter.type]"
                           :input="filter"
                           v-model="inputValues[filter.name]"
                ></component>
            </div>
            <div class="peer mT-10">
                <button type="button" class="btn cur-p btn-outline-dark" @click="apply">Apply Filter</button>
                <button type="button" class="btn cur-p btn-outline-dark mL-5" @click="clear">Clear</button>
            </div>
        </form>
    </div>
</template>

<script>
import Inputs from "@/mixins/admin/Filter/Inputs.js";
import TagInput from "@/Components/Admin/Form/TagInput.vue";
import {router} from "@inertiajs/vue3";

export default {
    components: {TagInput},
    mixins: [Inputs, TagInput],
    props: {
        filter: Object,
    },
    methods: {
        apply(event) {
            const filters = []
            for (const [key, filter] of  Object.entries(this.filter.filters)) {
                if (filter.value) {
                    filters.push({
                        [filter.class]: {
                            name: filter.name,
                            value: filter.value,
                            reference: filter.reference
                        }
                    })
                }
            }

            const encodedFilter = btoa(JSON.stringify(filters))
            router.get(route(this.filter.action) + `/?filter=${encodedFilter}`, {}, {
                preserveScroll: true
            })
        },
        clear() {
            router.get(route(this.filter.action))
        }
    }
}
</script>
