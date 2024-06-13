<template>
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <div class="mB-30 ta-r">
                    <Link :href="createLink ? route(createLink) : ''">
                        <button type="button" class="btn cur-p btn-primary btn-color">Add</button>
                    </Link>
                </div>

                <Filter :filter="filter" v-show="filter.filters"/>

                <table id="dataTable" class="table table-striped table-bordered dataTable table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th v-for="column in columns" :key="column.field" :class="column.sortable ? 'sorting' : ''">
                                {{column.label}}
                                <i v-if="column.sortable"
                                   :class="getSortColumnClass(column)"
                                   style="float: right; cursor: pointer"
                                   @click="sort(this, column)"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in collection.items" :key="item.id" @click="this.createFormLink(item.id)">
                            <td v-for="column in columns" :key="column.field">{{column.options ? column.options[item[column.field]] : item[column.field]}}</td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :items="{data}" />
            </div>
        </div>
    </div>
</template>

<script>
import {defineComponent} from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Pagination from "@/Components/Admin/Pagination.vue";
import Filter from "@/Partials/Admin/Filter.vue";
import {Link, router} from "@inertiajs/vue3";

export default defineComponent({

    components: {AdminLayout, Pagination, Link, Filter},
    props: {
        collection: Object,
        columns: Object,
        filter: {
            type: Object,
            default: null
        },
        createLink: {
            type: String,
            default: ''
        },
        editLink: {
            type: String,
            default: ''
        }
    },
    computed: {
        data() {
            return this.collection.data
        }
    },
    methods: {
        addRow() {
            this.$emit('add')
        },
        createFormLink(id) {
          router.get(route(this.editLink, id))
        },
        getSortColumnClass(column) {
            if (column.sortBy === 'asc') {
                return 'ti-arrow-down';
            }

            if (column.sortBy === 'desc') {
                return 'ti-arrow-up';
            }

            return 'ti-exchange-vertical';
        },
        sort(event, column) {

            for (let item of this.columns) {
                if (item.sortable && column.field !== item.field) {
                    item.sortBy = null
                }
            }

            if (column.sortBy === 'asc') {
                column.sortBy = 'desc'
            } else  {
                column.sortBy = 'asc'
            }

            let filters = {},
                value = column.sortBy;

            filters[column.filter.class] = {
                name: column.filter.name,
                value
            }

            const encodedFilter = btoa(JSON.stringify(filters))
            router.get(route(this.filter.action) + `/?filter=${encodedFilter}`, {}, {
                preserveScroll: true
            })        }
    },
    emits: [
        'add'
    ],
})
</script>

<style scoped>

</style>
