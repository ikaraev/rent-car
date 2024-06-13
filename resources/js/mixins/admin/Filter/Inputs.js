import Input from "@/Components/Admin/FilterInputs/Input.vue";
import Select from "@/Components/Admin/FilterInputs/Select.vue";

export default {
    data() {
        return {
            imputeComponents: {
                input: Input,
                search: Input,
                select: Select
            },
            inputValues: []
        }
    }
}
