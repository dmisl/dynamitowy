<script setup>

    import { ref, inject, onMounted } from 'vue'
    import axios from 'axios'

    const loading = ref(true)

    const user = ref([])
    const classroom = ref([])

    onMounted(async () => {
        try {
            const userResponse = await axios.get(`http://127.0.0.1:8000/api/user/${imported.user_id}`)
            user.value = userResponse.data.data
            const classroomResponse = await axios.get(`http://127.0.0.1:8000/api/classroom/${user.value.classroom_id}`)
            classroom.value = classroomResponse.data.data
        } catch (error) {

        } finally {
            loading.value = false
        }
    })

    const imported = inject('imported')
    const change = inject('change')

</script>
<template>
    <div>
        <div v-if="loading">
            <h3 class="fw-light">Loading...</h3>
        </div>
        <div v-else>
            <div class="d-flex text-start mt-2">
                <div style="padding-right: 60px;">
                    <div class="mx-auto" :style="{ 'background-image': `url('${user.photo}')`, 'width': '200px', 'height': '200px', 'background-position': 'center', 'background-size': 'cover', 'background-repeat': 'no-repeat' }"></div>
                </div>
                <div>
                    <h1>{{ user.name }}</h1>
                    <h3>{{ classroom.name }}</h3>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div @click="change(imported.rawGrade)" role="button" class="bg-primary p-3" style="margin-right: auto; width: 90%;">
                        <h5 class="fw-light m-0 p-0">Oceny</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div @click="change(imported.rawTimetable)" role="button" class="bg-danger p-3" style="margin: 0 auto; width: 90%;">
                        <h5 class="fw-light m-0 p-0">Plan lekcji</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div @click="change(imported.rawWarning)" role="button" class="bg-warning p-3" style="margin-left: auto; width: 90%;">
                        <h5 class="fw-light m-0 p-0">Uwagi</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
