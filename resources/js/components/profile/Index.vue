<script setup>

    import { ref, inject, onMounted } from 'vue'
    import axios from 'axios'

    const props = defineProps(['prefix'])

    const loading = ref(true)

    const user = ref([])
    const classroom = ref([])

    onMounted(async () => {
        try {
            const userResponse = await axios.get(`${props.prefix}api/user/${imported.user_id}`)
            user.value = userResponse.data.data
            const classroomResponse = await axios.get(`${props.prefix}api/classroom/${user.value.classroom_id}`)
            classroom.value = classroomResponse.data.data
            console.log(user.value)
        } catch (error) {

        } finally {
            loading.value = false
        }
    })

    const imported = inject('imported')
    const change = inject('change')
    const title = inject('title')
    title(`Profil ucznia | Dynamitowy`)

</script>
<template>
    <div>
        <div v-if="loading">
            <h3 class="fw-light">Loading...</h3>
        </div>
        <div v-else>

            <div class="d-flex mx-auto" style="margin-top: 20vh; width: 75%;">

                <div style="width: 220px; border-radius: 100%; height: 220px; background-size: cover; background-repeat: no-repeat; background-position: center;" :style="{ 'background-image': `url(${user.photo})` }"></div>
                <div class="d-table" style="margin-left: 30px;">
                    <div class="d-table-cell align-middle text-start">
                        <h1 class="p-0 m-0" style="font-weight: 400; font-size: 55px;">{{ user.name }}</h1>
                        <h2 class="p-0 m-0 mt-2 ms-1" style="font-weight: 400; font-size: 30px;">{{ user.email }}</h2>
                        <h1 class="p-0 m-0 mt-1" style="font-weight: 400; font-size: 60px;">{{ classroom.name }}</h1>
                    </div>
                </div>

            </div>

            <div class="mx-auto row" style="margin-top: 140px; width: 80%;">

                <div class="col-md-4">
                    <div @click="change(imported.rawGrade)" role="button" class="mx-auto black_element" style="border-radius: 17px; width: 98%; color: white;">

                        <h1 class="fw-light m-0" style="padding: 8px 35px; font-size: 38px;">Oceny</h1>

                    </div>
                </div>

                <div class="col-md-4">
                    <div @click="change(imported.rawWarning)" role="button" class="mx-auto yellow_element" style="border-radius: 17px; width: 98%; color: black;">

                        <h1 class="m-0" style="padding: 8px 35px; font-size: 38px; font-weight: 400;">Uwagi</h1>

                    </div>
                </div>

                <div class="col-md-4">
                    <div @click="change(imported.rawTimetable)" role="button" class="mx-auto green_element" style="border-radius: 17px; width: 98%; color: black;">

                        <h1 class="m-0" style="padding: 10px 35px; font-size: 38px; font-weight: 400;">Plan lekcji</h1>

                    </div>
                </div>

            </div>

        </div>
    </div>
</template>
