<template>
    <div class="app">
        <div class="peers ai-s fxw-nw h-100vh">
            <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv"
                 style="background-image:url(https://colorlib.com/polygon/adminator/assets/static/images/bg.jpg)">
                <div class="pos-a centerXY">
                    <div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px"><img class="pos-a centerXY"
                                                                                                src="assets/static/images/logo.png"
                                                                                                alt=""></div>
                </div>
            </div>
            <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r ps" style="min-width:320px">
                <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
                <form type="post" @submit.prevent="submit">
                    <div class="mb-3"><label class="text-normal text-dark form-label">Email</label> <input
                        type="email" class="form-control" placeholder="Email" v-model="form.email"></div>
                    <div class="mb-3"><label class="text-normal text-dark form-label">Password</label> <input
                        type="password" class="form-control" placeholder="Password" v-model="form.password"></div>
                    <div class="">
                        <div class="peers ai-c jc-sb fxw-nw">
                            <div class="peer">
                                <div class="checkbox checkbox-circle checkbox-info peers ai-c"><input type="checkbox"
                                                                                                      id="inputCall1"
                                                                                                      name="inputCheckboxesCall"
                                                                                                      class="peer">
                                    <label for="inputCall1" class="peers peer-greed js-sb ai-c form-label"><span
                                        class="peer peer-greed">Remember Me</span></label></div>
                            </div>
                            <div class="peer">
                                <button class="btn btn-primary btn-color">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import '@/../styles/sass/index.scss'
import {Head, useForm} from "@inertiajs/vue3";

export default {
    components: {Head},
  data() {
    return {
      form: useForm({
        email: null,
        password: null
      }),
    }
  },
    methods: {
        submit(form) {

            this.form.post(route('admin.adminPostLogin'),  {
                onError: err => {
                    for (let errKey in err) {
                        this.toast.error(err[errKey], {
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
