<template>
    <div class="z-20" aria-hidden="true">
        <div class="absolute" @click="$event.target.id === 'filterModel' && close()">
            <div class="fixed inset-0 bg-black/30" @click="$emit('closeVehicleModal')"></div>
            <div class="z-20 fixed inset-0 flex items-center justify-center md:p-4" id="filterModel">
                <div class="transform md:rounded-lg bg-white shadow-xl transition-all sm:my-24 lg:max-w-2xl h-full lg:h-auto md:h-auto w-full  overflow-auto">
                    <div
                        class="px-4 py-4 leading-none flex justify-between items-center font-medium text-sm bg-gray-100 border-b select-none">
                        <h2><span class="font-bold text-base">{{ title }}</span></h2>
                        <button type="button" @click="close"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                            <svg  class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                  fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round"
                                      stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                            </svg>
                            <span class="sr-only">Close modal</span></button>

                    </div>

                    <div class="max-h-full px-4 py-4">
                        <slot></slot>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            open: true,
        };
    },
    props: {
        title: {
            type: String,
            default: "",
        },
        header: {
            type: String,
            required: false,
            default: "",
        },
        width: {
            type: String,
            default: "full",
            validator: (value) => ["xs", "sm", "md", "lg", "full"].indexOf(value) !== -1,
        },
    },
    methods: {
        close() {
            this.open = false;
            this.$emit("close");
        },
    },
    computed: {
        maxWidth() {
            switch (this.width) {
                case "xs":
                    return "max-w-lg";
                case "sm":
                    return "max-w-xl";
                case "md":
                    return "max-w-2xl";
                case "lg":
                    return "max-w-3xl";
                case "full":
                    return "max-w-full";
            }
        },
    }
};
</script>
