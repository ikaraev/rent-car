<template>
    <div class="mb-3">
        <div class="col-md-6">
            <label class="fw-500 form-label">{{input.title}}</label>
            <div class="timepicker-input input-icon mb-3">
                <div class="input-group">
                    <div class="input-group-text bgc-white bd bdwR-0"><i class="ti-calendar"></i></div>
                    <input type="text"
                           :id="input.name"
                           :value="input.value"
                           :name="input.name"
                           class="form-control bdc-grey-200 start-date"
                           :placeholder="input.title"
                           data-provide="datepicker">
                </div>
            </div>
        </div>
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
