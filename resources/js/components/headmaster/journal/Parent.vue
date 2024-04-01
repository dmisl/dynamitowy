<script setup>

    import { ref, provide, markRaw } from 'vue'
    import axios from 'axios'

    import Index from './Index.vue';
    import Grade from './Grade.vue';
    import Presence from './Presence.vue';
    import GradeShow from './GradeShow.vue';
    import PresenceShow from './PresenceShow.vue';

    const rawIndex = markRaw(Index)
    const rawGrade = markRaw(Grade)
    const rawPresence = markRaw(Presence)
    const rawGradeShow = markRaw(GradeShow)
    const rawPresenceShow = markRaw(PresenceShow)

    const currentComponent = ref(rawIndex)

    function change(component)
    {
        currentComponent.value = component
    }

    const classroom_id = ref(0)
    const subject_id = ref(0)
    const lesson_id = ref(0)
    const date = ref(0)

    function changeGrade(classroomId, subjectId)
    {
        classroom_id.value = classroomId
        subject_id.value = subjectId
        change(rawGradeShow)
    }

    function changePresence(classroomId, lessonId, day)
    {
        classroom_id.value = classroomId
        lesson_id.value = lessonId
        date.value = day
        change(rawPresenceShow)
    }

    provide('imported', {rawIndex, rawGrade, rawPresence, rawGradeShow, rawPresenceShow})
    provide('change', change)
    provide('changeGrade', changeGrade)
    provide('changePresence', changePresence)

</script>

<template>
    <div>

        <div class="d-flex">

            <div style="height: 100%;">
                <div class="col-md-3 bg-info bg-gradient" style="position: fixed; height: 100vh;">
                    <div class="user-select-none">

                        <div>

                            <div @click="change(rawPresence)" role="button" class="m-0 p-0 border-bottom border-dark">
                                <p class="p-0 m-0 ps-1 pt-1 fw-medium">Zarządzać obecnościami</p>
                            </div>
                            <div @click="change(rawGrade)" role="button" class="m-0 p-0 border-bottom border-dark">
                                <p class="p-0 m-0 ps-1 pt-1 fw-medium">Zarządzać ocenami</p>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>

            <div class="col-md-9">

                <component :is="currentComponent" :classroom_id="1" :subject_id="subject_id" :lesson_id="lesson_id" :date="date"></component>

            </div>

        </div>

    </div>
</template>
