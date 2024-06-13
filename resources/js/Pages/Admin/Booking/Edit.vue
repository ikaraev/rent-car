<template>
    <AdminLayout>
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Booking</h4>

            <div class="masonry-item">
                <div id="mainContent">
                    <form :method="this.schema.method" @submit.prevent="submit" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div class="gap-10 peers jc-fe">
                                <div class="peer">
                                    <Link :href="route('admin.booking.index')">
                                        <button type="button" class="btn cur-p btn-outline-secondary">Back</button>
                                    </Link>
                                </div>
                                <div class="peer">
                                    <button type="submit" class="btn cur-p btn-outline-primary">Save and Continue
                                    </button>
                                </div>
                                <div class="peer">
                                    <button type="submit" class="btn btn-primary btn-color">Save</button>
                                </div>
                            </div>
                        </div>

                        <div class="masonry-item mT-30" v-for="(block, key) in schema.blocks" :key="key">
                            <div class="bgc-white p-20 bd">
                                <h6 class="c-grey-900">{{block.title}}</h6>
                                <div class="mT-30">

                                    <component v-for="item in block.inputs"
                                               :is="imputeComponents[item.type]"
                                               :input="prepareInput(item)"
                                               v-model="form[item.name]"
                                    ></component>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Link, useForm} from "@inertiajs/vue3";
import Inputs from "@/mixins/admin/Form/Inputs.js";
import {useToast} from "vue-toastification";

export default {
    components: {Link, AdminLayout},
    props:{
        schema: Object,
        entity: Object
    },
    mixins: [Inputs],
    data() {
        return {
            form: useForm({
                id: this.entity ? this.entity.id : null,
                status: this.entity ? this.entity.status : null,
                vehicle_id: this.entity ? this.entity.vehicle_id : null,
                start: this.entity ? this.entity.start : null,
                finish: this.entity ? this.entity.finish : null,
                properties: {
                    id: this.entity.properties ? this.entity.properties.id : null,
                    day_price: this.entity.properties ? this.entity.properties.day_price : null,
                    total_price: this.entity.properties ? this.entity.properties.total_price : null,
                },
                contactForm: {
                    id: this.entity.contactForm ? this.entity.contactForm.id : null,
                    name: this.entity.contactForm ? this.entity.contactForm.name : null,
                    email: this.entity.contactForm ? this.entity.contactForm.email : null,
                    phone: this.entity.contactForm ? this.entity.contactForm.phone : null,
                    date_birthday: this.entity.contactForm ? this.entity.contactForm.date_birthday : null,
                    comment: this.entity.contactForm ? this.entity.contactForm.comment : null,
                },
            }),
            toast: useToast(),
        }
    },
    methods: {
        prepareInput(item) {
            let input = item;
            if (this.entity[item.name]) {
                input.value = this.entity[item.name]
            }

            if (this.entity.properties[item.name]) {
                input.value = this.entity.properties[item.name]
            }

            if (this.entity.contactForm[item.name]) {
                input.value = this.entity.contactForm[item.name]
            }

            return input
        },
        submit(form) {
            let elements = form.currentTarget.elements;

            for (const key in elements) {
                if (this.form.hasOwnProperty(elements[key].name)) {
                    this.form[elements[key].name] = elements[key].value
                }

                if (this.form.properties.hasOwnProperty(elements[key].name)) {
                    this.form.properties[elements[key].name] = elements[key].value
                }

                if (this.form.contactForm.hasOwnProperty(elements[key].name)) {
                    this.form.contactForm[elements[key].name] = elements[key].value
                }
            }

            this.form.post(route('admin.booking.store'),  {
                onError: err => {
                    for (let errKey in err) {
                        this.toast.error(err[errKey][0], {
                            position: "bottom-right",
                            timeout: 3000,
                        })
                    }
                }
            })
        }
    }
}
</script>
