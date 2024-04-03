<script setup>

    import { ref, provide, markRaw } from 'vue'

    import Index from './Index.vue';
    import Grade from './Grade.vue';
    import Timetable from './Timetable.vue';
    import Warning from './Warning.vue';

    const rawIndex = markRaw(Index)
    const rawGrade = markRaw(Grade)
    const rawTimetable = markRaw(Timetable)
    const rawWarning = markRaw(Warning)

    const currentComponent = ref(rawIndex)

    const props = defineProps(['redirect', 'user_id', 'pre'])
    const user_id = props.user_id
    const changed = ref(false)

    if(props.redirect && !changed.value)
    {
        switch (props.redirect) {
            case 1:
                currentComponent.value = rawGrade
                changed.value = true
                break;
            case 2:
                currentComponent.value = rawTimetable
                changed.value = true
                break;
            case 3:
                currentComponent.value = rawWarning
                changed.value = true
                break;
            default:
                break;
        }
    }

    function change(component)
    {
        currentComponent.value = component
    }

    function title(text)
    {
        document.querySelector('title').innerHTML = text
    }

    title(`Dziennik`)

    provide('title', title)

    provide('imported', {rawIndex, rawGrade, rawTimetable, rawWarning, user_id})
    provide('change', change)

</script>
<template>
    <div>
        <component :is="currentComponent" :prefix="props.pre"></component>
    </div>
</template>
