<template>
    <div>
        <app-create v-if="this.layout['zarządaj uczniami']" ></app-create>
        <app-timetable v-if="this.layout['Obecnosci']"></app-timetable>
        <app-timetable-edit v-if="this.layout['Plan lekcji']"></app-timetable-edit>
        <app-show></app-show>
    </div>
</template>

<script>
import AppCreate from './AppCreate.vue'
import AppTimetable from './AppTimetable.vue'
import AppTimetableEdit from './AppTimetableEdit.vue'
import AppShow from './AppShow.vue'

export default {
    data() {
        return {
            layout: [
                {"zarządaj uczniami":true},
                {"Obecnosci":false},
                {"Plan lekcji":false},
                {"Edytowac plan lekcji":false}
        ]
        }
    },
    components:{
        AppCreate,
        AppTimetable,
        AppShow,
        AppTimetableEdit
    },
    created() {
        this.$eventBus.$on('ChangeComponent', data => {
            this.layout = data
        })
        switch (this.layout) {
            case "zarządaj uczniami":
                
                break;
                case "Obecnosci":
                
                break;
                case "Plan lekcji":
                
                break;
                case "Edytowac plan lekcji":
                
                break;
            default:
                break;
        }
    },
}

</script>
