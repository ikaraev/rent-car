<template>
    <FrontendLayout>
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-8">
                <div class="font-sans text-base text-gray-900 sm:px-10">
                    <div class="text-base text-gray-900">
                        <div class="mx-auto w-full sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl">
                            <div class="mx-2 pt-12 text-center md:mx-auto md:w-2/3 md:pb-12">
                                <h1 class="text-4xl font-normal text-gray-900 dark:text-white">{{ __('Contact us') }}</h1>
                                <div class="text-lg sm:text-xl xl:text-xl">
                                    <div class="text-gray-900">
                                        <p class="tracking-tighter text-gray-500 md:text-lg dark:text-gray-400">
                                            {{
                                                __('Have a question, comment, or suggestion? We\'d love to hear from you! Please use the form below to get in touch with us.')
                                            }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto mb-20 flex w-full max-w-screen-lg flex-col overflow-hidden rounded-xl text-gray-900 md:flex-row md:border md:shadow-lg">
                        <form class="mx-auto w-full max-w-xl border-gray-200 px-10 py-8 md:px-8">
                            <div class="mb-4">
                                <label class="text mb-2 block font-medium" for="email">{{ __('Your email') }}:</label>
                                <input
                                    v-model="email"
                                    class="w-full rounded border border-gray-300 px-3 py-2 outline-none ring-blue-500 focus:ring"
                                    id="email"
                                    type="email"
                                    required=""/>
                            </div>
                            <div class="mb-4">
                                <label class="text mb-2 block font-medium" for="subject">{{ __('Subject') }}:</label>
                                <input
                                    v-model="subject"
                                    class="w-full rounded border border-gray-300 px-3 py-2 outline-none ring-blue-500 focus:ring"
                                    id="subject"
                                    type="subject"
                                    required=""/>
                            </div>
                            <div class="mb-4">
                                <label class="text mb-2 block font-medium" for="message">{{ __('Message') }}:</label>
                                <textarea
                                    v-model="message"
                                    class="h-52 w-full rounded border border-gray-300 px-3 py-2 outline-none ring-blue-500 focus:ring"
                                    id="message"
                                    required=""></textarea>
                            </div>
                            <div class="flex items-center">
                                <div class="flex-1"></div>
                                <button type="submit"
                                        @click="send"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    {{ __('Submit message') }}
                                </button>
                            </div>
                        </form>
                        <div class="mt-10 bg-blue-600 px-10 py-8 text-gray-100 md:mt-0 md:ml-auto">
                            <div class="">
                                <p class="mb-4 font-medium border-b  pb-2">{{ __('OFFICE HOURS') }}</p>
                                <p class="mb-4">{{ __('Monday') + ' – '  + __('Friday') }}: 10:00 – 19:00</p>
                                <p class="mb-4">{{ __('Weekend') }}: 11:00 - 15:00</p>
<!--                                <p class="mb-4">-->
<!--                                    {{ __('Email') }}:-->
<!--                                    <a href="#" class="font-semibold underline">support@apps.io</a>-->
<!--                                </p>-->
                                <p class="mb-4">
                                    {{ __('Phone') }}:
                                    <a href="#" class="font-semibold underline">+995 593 74 14 34</a>
                                </p>
                                <hr class="my-2 h-0 border-t border-r-0 border-b-0 border-l-0 border-gray-300">
<!--                                <p class="mb-4">Org.no: 63452-2832</p>-->
<!--                                <p class="mb-4">VAT no: 32353</p>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!--        <ContactButton/>-->
    </FrontendLayout>
</template>

<script>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import ContactButton from "@/Partials/Frontend/Index/ContactButton.vue";
import {useToast} from "vue-toastification";

export default {
    components: {ContactButton, FrontendLayout},
    data() {
        return {
            email: this.email,
            subject: this.subject,
            message: this.message,

            toast: useToast(),
        }
    },
    methods: {
        send(event) {
            if (!event.target.form.checkValidity()) {
                return
            }
            event.preventDefault()

            fetch(route('common.contact.send'), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    email: this.email,
                    subject: this.subject,
                    message: this.message
                })
            })
                .then(async result => {
                    const res = await result.json()
                    if (!result.ok) {
                        this.toast.error(res.message, {
                            timeout: 10000,
                        })
                        return
                    }
                    return res
                })
                .then(result => {

                    if (result.data.success) {
                        this.toast.success(result.data.message, {
                            timeout: 10000,
                        })
                    }
                })
                .catch(async err => {
                    this.errors = await JSON.parse(err.message)
                })
        }
    }
}

</script>
