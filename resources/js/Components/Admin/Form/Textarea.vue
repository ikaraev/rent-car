<template>
    <div class="mb-3">
        <label class="form-label">{{input.title}}</label>
        <textarea type="text"
               class="form-control"
               :id="input.name"
               :name="input.name"
               :placeholder="input.title"
               :value="input.value"
        ></textarea>
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
