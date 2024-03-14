<template>
    <div>
        <component :is="currentComponent" :classroom_id="props.classroom_id" :user_id="user_id"></component>
    </div>
</template>

<script setup>

    import { markRaw, ref, defineComponent, provide } from 'vue';

    import Index from './Index.vue';
    import Show from './Show.vue';
    import Create from './Create.vue';
    import Edit from './Edit.vue';
    import Timetable from './Timetable.vue';
    import TimetableEdit from './TimetableEdit.vue';

    const props = defineProps(['classroom_id'])

    const rawIndex = markRaw(Index)
    const rawShow = markRaw(Show)
    const rawCreate = markRaw(Create)
    const rawEdit = markRaw(Edit)
    const rawTimetable = markRaw(Timetable)
    const rawTimetableEdit = markRaw(TimetableEdit)

    const currentComponent = ref(Index)
    const user_id = ref(0)

    function change(component, userId = 0)
    {
        user_id.value = userId
        currentComponent.value = component
    }

    provide('imported', {rawIndex, rawShow, rawCreate, rawEdit, rawTimetable, rawTimetableEdit})
    provide('change', change)

</script>
