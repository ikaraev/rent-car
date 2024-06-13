import Input from "@/Components/Admin/Form/Inpute.vue";
import Textarea from "@/Components/Admin/Form/Textarea.vue";
import Select from "@/Components/Admin/Form/Select.vue";
import Datepicker from "@/Components/Admin/Form/Datepicker.vue";
import SearchSelect from "@/Components/Admin/Form/SearchSelect.vue";

export default {
    data() {
        return {
            imputeComponents: {
                text: Input,
                textarea: Textarea,
                select: Select,
                datepicker: Datepicker,
                searchSelect: SearchSelect
            },
            inputValues: []
        }
    }
}
