<script setup>

    import { ref, provide, markRaw, onMounted, onBeforeUnmount } from 'vue'

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

    function checkIfAdd(attribute = '')
    {
        let url = window.location.href
        if(url.charAt(url.length-1) == '/')
        {
            window.history.pushState({}, '', url+attribute);
        } else if(url.charAt(url.length-1) == 'e')
        {
            window.history.pushState({}, '', url+'/'+attribute);
        } else
        {
            window.history.pushState({}, '', url.slice(0, -1)+attribute);
        }
    }

    function change(component)
    {
        if(component == rawIndex)
        {
            checkIfAdd()
        } else if(component == rawGrade)
        {
            checkIfAdd(1)
        } else if(component == rawTimetable)
        {
            checkIfAdd(2)
        } else
        {
            checkIfAdd(3)
        }
        currentComponent.value = component
    }

    const handlePopState = (event) => {
        window.location.href = window.location.href
    }

    onMounted(() => {
        window.addEventListener('popstate', handlePopState);
    });

    onBeforeUnmount(() => {
        window.removeEventListener('popstate', handlePopState);
    });

    if(props.redirect)
    {
        switch (props.redirect) {
            case 0:
                currentComponent.value = rawIndex
                break;
            case 1:
                currentComponent.value = rawGrade
                break;
            case 2:
                currentComponent.value = rawTimetable
                break;
            case 3:
                currentComponent.value = rawWarning
                break;
            default:
                break;
        }
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
