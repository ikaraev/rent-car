<template>
    <AdminLayout>
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Vehicle</h4>

            <div class="masonry-item">
                <div class="bgc-white p-20 bd"><h6 class="c-grey-900"></h6>
                    <div class="mT-30">
                        <form :method="this.schema.method" @submit.prevent="submit" enctype="multipart/form-data">

                            <div class="mb-3">
                                <div class="gap-10 peers jc-sb">
                                    <div class="gap-10 peers">
                                        <div class="dropdown pos-a">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">Language
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <div :class="this.entity && this.entity.locale === 'en' ? 'dropdown-item active' : 'dropdown-item'" @click="this.changeLanguage('en')">English</div>
                                                <div :class="this.entity && this.entity.locale === 'ru' ? 'dropdown-item active' : 'dropdown-item'" @click="this.changeLanguage('ru')">Russian</div>
                                                <div :class="this.entity && this.entity.locale === 'ge' ? 'dropdown-item active' : 'dropdown-item'" @click="this.changeLanguage('ge')">Georgian</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="gap-10 peers">
                                        <div class="peer">
                                            <Link :href="route('admin.car.index')">
                                                <button type="button" class="btn cur-p btn-outline-secondary">Back</button>
                                            </Link>
                                        </div>
                                        <div class="peer">
                                            <button type="button" class="btn cur-p btn-outline-danger" @click="openModal"
                                                    v-show="(this.entity && this.entity.id)">Delete
                                            </button>
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
                            </div>
                            <div class="masonry-item mT-30" v-for="(block, key) in schema.blocks" :key="key">
                                <component v-for="item in block.inputs"
                                           :is="imputeComponents[item.type]"
                                           :input="prepareInput(item)"
                                           v-model="form[item.name]"
                                ></component>

                                <div class="mb-3">
                                    <Uploader
                                        name="images"
                                        :server="route('admin.car.upload.image')"
                                        @add="addMedia"
                                        @remove="removeMedia"
                                        :media="images.saved"
                                        :location="route().t.url"
                                    />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
      <Modal :show="confirmingVehicleDeletion ?? false"
             @close="closeModal"
             :title="'Delete Vehicle'"
             :message="'Are you sure you want to delete the machine?'"
      >
        <button type="button" class="btn cur-p btn-danger btn-color" @click="remove">Delete</button>
      </Modal>
    </AdminLayout>

</template>

<script>
import Uploader from "vue-media-upload";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Modal from "@/Components/Admin/Modal.vue"
import {useForm, Link} from '@inertiajs/vue3'
import {useToast} from "vue-toastification";
import {router} from '@inertiajs/vue3'
import Inputs from "@/mixins/admin/Form/Inputs.js";

export default{
    components: {AdminLayout, Uploader, Link, Modal},
    props: {
        schema: Object,
        entity: Object,
        errors: Object
    },
    mixins: [Inputs],
    data() {
        return {
            images: {
                saved: this.entity ? this.entity.images : [],
                added: [],
                removed: []
            },
            form: useForm({
                id: this.entity ? this.entity.id : null,
                is_active: this.entity ? this.entity.is_active : null,
                name: this.entity ? this.entity.name : null,
                vin_code: this.entity ? this.entity.vin_code : null,
                car_number: this.entity ? this.entity.car_number : null,
                rent_price: this.entity ? this.entity.rent_price : null,
                first_period_discount_price: this.entity ? this.entity.first_period_discount_price : null,
                second_period_discount_price: this.entity ? this.entity.second_period_discount_price : null,
                engine: this.entity ? this.entity.engine : null,
                fuel_consumption: this.entity ? this.entity.fuel_consumption : null,
                gear_box: this.entity ? this.entity.gear_box : null,
                year: this.entity ? this.entity.year : null,
                description: this.entity ? this.entity.description : null,
                url_rewrite: this.entity ? this.entity.url_rewrite : null,
                locale:  this.entity ? this.entity.locale : null,
                images: {
                    added: [],
                    removed: []
                }
            }),
            toast: useToast(),
            confirmingVehicleDeletion: false
        }
    },
    methods: {
        prepareInput(item) {
            let input = item;
            if (this.entity && this.entity[item.name]) {//TODO: create Form.vue for separating a create and an edit actions
                input.value = this.entity[item.name]
            }
            return input
        },
        addMedia(addedImage, addedMedia) {
            this.images.added = addedMedia
            this.form.images.added = addedMedia
        },
        removeMedia(addedImage, removedMedia) {
            this.images.removed = removedMedia
            this.form.images.removed = removedMedia
        },
        submit(form) {
            let elements = form.currentTarget.elements;

            for (const key in elements) {
                if (this.form.hasOwnProperty(elements[key].name)) {
                    this.form[elements[key].name] = elements[key].value
                }
            }


            this.form.post(route('admin.car.store'),  {
                onError: err => {
                    for (let errKey in err) {

                        this.toast.error(err[errKey][0], {
                            position: "bottom-right",
                            timeout: 3000,
                        })
                    }
              }
            })
        },
        changeLanguage(locale) {
            this.form.locale = locale;
            router.get(route('admin.car.change.locale', [this.entity.id, locale]))
        },
        remove() {
          router.delete(route('admin.car.destroy', {'id': this.entity.id}));
        },
        openModal() {
          this.confirmingVehicleDeletion = true
        },
        closeModal() {
          this.confirmingVehicleDeletion = false
        },
    }
}
</script>
