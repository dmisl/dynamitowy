<script setup>

    import { ref, provide, markRaw, onMounted } from 'vue'
    import axios from 'axios'

    import Index from './Index.vue';
    import Show from './Show.vue';
    import Create from './Create.vue';

    const rawIndex = markRaw(Index)
    const rawShow = markRaw(Show)
    const rawCreate = markRaw(Create)

    const currentComponent = ref(rawIndex)

    const teacher_id = ref(0)

    function change(component, teacherId = 0)
    {
        currentComponent.value = component
        teacher_id.value = teacherId
    }

    const loading = ref(true)

    const teachers = ref([])
    const users = ref([])

    async function getParentData()
    {
        try {
            const teachersResponse = await axios.get(`http://127.0.0.1:8000/api/teachersModel`)
            teachers.value = teachersResponse.data.data
            const usersResponse = await axios.get(`http://127.0.0.1:8000/api/users`)
            users.value = usersResponse.data.data
        } catch (error) {

        } finally {
            loading.value = false
        }
    }

    onMounted(async () => {
        getParentData()
    })

    provide('imported', {rawIndex, rawShow, rawCreate, teacher_id})
    provide('change', change)
    provide('getParentData', getParentData)

</script>

<template>
    <div>

        <div class="d-flex">

            <div style="height: 100%;">
                <div class="col-md-3 bg-info bg-gradient" style="position: fixed; height: 100vh; overflow: auto;">
                    <div class="user-select-none">

                        <div v-if="loading">Loading...</div>

                        <div v-else>

                            <div @click="change(rawIndex)" role="button" class="m-0 p-0 border-bottom border-dark">
                                <p class="p-0 m-0 ps-1 pt-1 fw-medium">Zarządzanie nauczycielami</p>
                            </div>
                            <div @click="change(rawCreate)" role="button" class="m-0 p-0 border-bottom border-dark">
                                <p class="p-0 m-0 ps-1 pt-1 fw-medium">Dodać nauczyciela</p>
                            </div>
                            <div v-for="teacher in teachers" @click="change(rawShow, teacher.id)" role="button" class="m-0 p-0 border-bottom border-dark">
                                <p class="p-0 m-0 ps-2 pt-1 fw-light">- {{ users.find(obj => obj.id == teacher.user_id).name }}</p>
                            </div>
                            <div class="pb-3"></div>


                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>

            <div class="col-md-9">

                <component :is="currentComponent"></component>

            </div>

        </div>

    </div>
</template>
