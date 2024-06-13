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
                                               :input="item"
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
        schema: Object
    },
    mixins: [Inputs],
    data() {
      return {
          form: useForm({
              status: null,
              vehicle_id: null,
              start: null,
              finish: null,
              properties: {
                  day_price: null,
                  total_price: null,
              },
              contactForm: {
                  name: null,
                  email: null,
                  phone: null,
                  date_birthday: null,
                  comment: null,
              },
          }),
          toast: useToast(),
      }
    },
    methods: {
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
