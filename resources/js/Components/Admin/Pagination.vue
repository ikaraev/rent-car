<template>
    <div>
        <div class="flex flex-wrap mt-8">
            <template v-for="(item, key) in items" :key="key">
                <div class="dataTables_paginate paging_simple_numbers justify-between" id="dataTable_paginate">
                    <Link
                        class="paginate_button previous disabled" aria-controls="dataTable" data-dt-idx="0" tabindex="0"
                        id="dataTable_previous"
                        :href="item.prev_page_url"
                        v-html="'Previous'" />
                    <Link
                        class="paginate_button next" aria-controls="dataTable" data-dt-idx="7" tabindex="0"
                        id="dataTable_next"
                        :href="item.next_page_url"
                        v-html="'Next'" />
                </div>
            </template>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: {
        items: Array,
    }
}
</script>
