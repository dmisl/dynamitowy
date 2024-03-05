<template>
    <div>
        
    </div>
</template>

<script>
import ClassroomMenu from './components/menu/AppMenuClassroom.vue';
import AppCreate from './components/ClassroomComponentsPage/AppCreate.vue';
import AppEdit from './components/ClassroomComponentsPage/AppEdit.vue';
import AppShow from './components/ClassroomComponentsPage/AppShow.vue';
import AppTimetable from './components/ClassroomComponentsPage/AppTimetable.vue';
import AppTimetableEdit from './components/ClassroomComponentsPage/AppTimetableEdit.vue';


export default {
    name: "AppFlip",
    comments: {
        AppCreate,
        AppEdit,
        AppShow,
        AppTimetable,
        AppTimetableEdit,
    }
}
</script>