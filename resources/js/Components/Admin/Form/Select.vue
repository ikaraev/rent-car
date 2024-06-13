<template>
    <div class="mb-3">
        <label class="form-label">{{input.title}}</label>
        <select
            class="form-control"
            :id="input.name"
            :name="input.name"
            v-model="input.value"
        >
            <!-- This is option for boolean type where it checks attribute option backend_type -->
            <option></option>

            <!-- This is default option rendering -->
            <option v-for="(option, value) in input.options"
                    :key="value"
                    :value="value"
            >{{option}}</option>
        </select>
    </div>
</template>

<script>
export default {
    props: {
        input: Object,
        modelValue: null
    }
}
</script>
