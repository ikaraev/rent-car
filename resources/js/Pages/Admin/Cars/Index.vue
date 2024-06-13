<template>
    <AdminLayout>
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Cars</h4>
            <Table
                :collection="collection"
                :columns="columns"
                :filter="filter"
                :create-link="createLink"
                :edit-link="editLink"/>
        </div>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Table from "@/Components/Admin/Table.vue";
import {router} from "@inertiajs/vue3";

export default {
    components: {Table, AdminLayout},
    props: {
        columns: Object,
        filter: Object,
        collection: Object,
        createLink : String,
        editLink: String
    },
    methods: {
      addRow() {
        router.get(route(this.createLink));
      }
    }
}
</script>
