<script setup>

    import { ref, provide, markRaw, onMounted } from 'vue'
    import axios from 'axios'

    import Index from './Index.vue';
    import Show from './Show.vue';
    import Create from './Create.vue';

    const props = defineProps(['pre'])

    const rawIndex = markRaw(Index)
    const rawShow = markRaw(Show)
    const rawCreate = markRaw(Create)

    const currentComponent = ref(rawIndex)

    const classroom_id = ref(0)

    function change(component, classroomId = 0)
    {
        currentComponent.value = component
        classroom_id.value = classroomId
    }

    provide('imported', {rawIndex, rawShow, rawCreate, classroom_id})
    provide('change', change)

    const loading = ref(true)

    const classrooms = ref([])

    onMounted(async () => {
        try {
            const classroomsResponse = await axios.get(`http://127.0.0.1:8000/api/classrooms`)
            classrooms.value = classroomsResponse.data.data
        } catch (error) {

        } finally {
            loading.value = false
        }
    })

</script>

<template>
    <div>

        <div class="d-flex">

            <div style="height: 100%;">
                <div class="col-md-3 bg-gradient" style="position: fixed; height: 100vh; background-color: rgb(119 178 255);">
                    <div class="user-select-none">

                        <div v-if="loading">Loading...</div>

                        <div v-else>

                            <div @click="change(rawIndex)" role="button" class="m-0 p-0 border-bottom border-dark">
                                <p class="p-0 m-0 ps-1 pt-1 fw-medium">Zarządzanie klasami</p>
                            </div>
                            <div v-for="classroom in classrooms" @click="change(rawShow, classroom.id)" role="button" class="m-0 p-0 border-bottom border-dark">
                                <p class="p-0 m-0 ps-2 pt-1 fw-medium">- Klasa {{ classroom.name }}</p>
                            </div>
                            <div @click="change(rawCreate)" role="button" class="m-0 p-0 border-bottom border-dark">
                                <p class="p-0 m-0 ps-1 pt-1 fw-medium">Utworzyć klasę</p>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>

            <div class="col-md-9">

                <component :is="currentComponent" :prefix="props.pre"></component>

            </div>

        </div>

    </div>
</template>
