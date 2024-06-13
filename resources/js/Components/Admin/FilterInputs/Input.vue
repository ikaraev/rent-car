<template>
    <div class="col-md-2 mb-2">
        <label class="form-label" for="validationCustom05">{{input.title}}</label>
        <input type="text"
               class="form-control"
               @input="$emit('update:modelValue', $event.target.value)"
               :id="`filter-${input.name}`"
               v-model="input.value"
               :placeholder="input.title"
               required="">
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

<style scoped>

</style>
