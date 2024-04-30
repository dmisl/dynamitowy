<script setup>

    import { ref, provide, markRaw, onMounted } from 'vue'
    import axios from 'axios'

    import Index from './Index.vue';
    import Show from './Show.vue';
    import ShowClassroom from './ShowClassroom.vue';
    import Create from './Create.vue';

    const props = defineProps(['teacher_id', 'pre'])

    const loading = ref(true)

    const classrooms = ref([])

    const rawIndex = markRaw(Index)
    const rawShow = markRaw(Show)
    const rawShowClassroom = markRaw(ShowClassroom)
    const rawCreate = markRaw(Create)

    const currentComponent = ref(rawIndex)

    const warning_id = ref(0)
    const classroom_id = ref(0)

    onMounted(async () => {
        try {
            const classroomsResponse = await axios.get(`http://127.0.0.1:8000/api/classrooms`)
            classrooms.value = classroomsResponse.data.data
        } catch (error)
        {
            console.error(error)
        } finally
        {
            loading.value = false
        }
    })

    function change(component, warningId = 0, classroomId)
    {
        currentComponent.value = component
        warning_id.value = warningId
        classroom_id.value = classroomId
    }

    provide('imported', {rawIndex, rawShow, rawShowClassroom, classroom_id})
    provide('change', change)

</script>

<template>
    <div>

        <div class="d-flex">

            <div style="height: 100%;">
                <div class="col-md-3 bg-gradient" style="position: fixed; height: 100vh; background-color: rgb(119 178 255);">
                    <div class="user-select-none">

                        <div v-if="loading">Loading</div>

                        <div v-else>

                            <div @click="change(rawIndex)" role="button" class="m-0 p-0 border-bottom border-dark">
                                <p class="p-0 m-0 ps-1 pt-1 fw-medium">Lista wszystkich uwag</p>
                            </div>
                            <div @click="change(rawCreate)" role="button" class="m-0 p-0 border-bottom border-dark">
                                <p class="p-0 m-0 ps-1 pt-1 fw-medium">Utworzyć uwagę</p>
                            </div>
                            <div v-for="classroom in classrooms" @click="change(rawShowClassroom, 0, classroom.id)" role="button" class="m-0 p-0 border-bottom border-dark">
                                <p class="p-0 m-0 ps-2 pt-1 fw-medium">- Uwagi {{ classroom.name }}</p>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>

            <div class="col-md-9">

                <component :is="currentComponent" :teacher_id="teacher_id" :warning_id="warning_id" :classroom_id="classroom_id" :prefix="props.pre"></component>

            </div>

        </div>

    </div>
</template>
