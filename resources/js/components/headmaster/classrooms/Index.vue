<script setup>

    import { ref, onMounted, inject } from 'vue'
    import axios from 'axios'

    const loading = ref(true)

    const classrooms = ref([])
    const teachers = ref([])
    const users = ref([])

    const column1 = ref([])
    const column2 = ref([])
    const column3 = ref([])

    onMounted(async () => {
        try {
            const classroomsResponse = await axios.get(`http://127.0.0.1:8000/api/classrooms`)
            classrooms.value = classroomsResponse.data.data
            classrooms.value.push('add')
            for (let i = 0; i < classrooms.value.length; i++) {
                if (i % 3 === 0) {
                    column1.value.push(classrooms.value[i]);
                } else if (i % 3 === 1) {
                    column2.value.push(classrooms.value[i]);
                } else {
                    column3.value.push(classrooms.value[i]);
                }
            }
            const teachersResponse = await axios.get(`http://127.0.0.1:8000/api/teachersModel`)
            teachers.value = teachersResponse.data.data
            const usersResponse = await axios.get(`http://127.0.0.1:8000/api/users`)
            users.value = usersResponse.data.data
        } catch (error) {

        } finally {
            loading.value = false
        }
    })

    const imported = inject('imported')
    const change = inject('change')
    const title = inject('title')
    title(`Lista wszystkich klas | Dynamitowy`)

</script>

<template>
    <div class="p-3 user-select-none">

        <div v-if="loading">Loading...</div>

        <div v-else>

            <h1 class="fw-light">Lista wszystkich klas</h1>

            <div class="row">
                <div class="col-md-3">
                    <div v-for="classroom in column1">
                        <div v-if="classroom == 'add'" @click="change(imported.rawCreate)" role="button" class="bg-success-subtle mx-auto rounded-4 p-5 mt-4 d-table text-center" style="width: 90%;">
                            <svg class="align-middle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="30" height="30" viewBox="0 0 256 256" xml:space="preserve">
                                <defs></defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 45 90 c -4.418 0 -8 -3.582 -8 -8 V 8 c 0 -4.418 3.582 -8 8 -8 c 4.418 0 8 3.582 8 8 v 74 C 53 86.418 49.418 90 45 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 82 53 H 8 c -4.418 0 -8 -3.582 -8 -8 c 0 -4.418 3.582 -8 8 -8 h 74 c 4.418 0 8 3.582 8 8 C 90 49.418 86.418 53 82 53 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                        </div>
                        <div v-else class="bg-primary-subtle mx-auto rounded-4 p-3 px-4 pb-3 mt-4" style="width: 90%;">
                            <p class="fs-5 m-0 p-0">Klasa - <span class="fw-medium">{{ classroom.name }}</span></p>
                            <p class="p-0 m-0">Wychowawca</p>
                            <p class="p-0 m-0 fw-medium">{{ users.find(ob => ob.id == teachers.find(obj => obj.id === classroom.teacher_id).user_id).name }}</p>
                            <p @click="change(imported.rawShow, classroom.id)" class="mt-2 p-0 m-0 small text-primary text-decoration-underline text-end" role="button">zarządzanie</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div v-for="classroom in column2">
                        <div v-if="classroom == 'add'" @click="change(imported.rawCreate)" role="button" class="bg-success-subtle mx-auto rounded-4 p-5 mt-4 d-table text-center" style="width: 90%;">
                            <svg class="align-middle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="30" height="30" viewBox="0 0 256 256" xml:space="preserve">
                                <defs></defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 45 90 c -4.418 0 -8 -3.582 -8 -8 V 8 c 0 -4.418 3.582 -8 8 -8 c 4.418 0 8 3.582 8 8 v 74 C 53 86.418 49.418 90 45 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 82 53 H 8 c -4.418 0 -8 -3.582 -8 -8 c 0 -4.418 3.582 -8 8 -8 h 74 c 4.418 0 8 3.582 8 8 C 90 49.418 86.418 53 82 53 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                        </div>
                        <div v-else class="bg-primary-subtle mx-auto rounded-4 p-3 px-4 pb-3 mt-4" style="width: 90%;">
                            <p class="fs-5 m-0 p-0">Klasa - <span class="fw-medium">{{ classroom.name }}</span></p>
                            <p class="p-0 m-0">Wychowawca</p>
                            <p class="p-0 m-0 fw-medium">{{ users.find(ob => ob.id == teachers.find(obj => obj.id === classroom.teacher_id).user_id).name }}</p>
                            <p @click="change(imported.rawShow, classroom.id)" class="mt-2 p-0 m-0 small text-primary text-decoration-underline text-end" role="button">zarządzanie</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div v-for="classroom in column3">
                        <div v-if="classroom == 'add'" @click="change(imported.rawCreate)" role="button" class="bg-success-subtle mx-auto rounded-4 p-5 mt-4 d-table text-center" style="width: 90%;">
                            <svg class="align-middle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="30" height="30" viewBox="0 0 256 256" xml:space="preserve">
                                <defs></defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 45 90 c -4.418 0 -8 -3.582 -8 -8 V 8 c 0 -4.418 3.582 -8 8 -8 c 4.418 0 8 3.582 8 8 v 74 C 53 86.418 49.418 90 45 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 82 53 H 8 c -4.418 0 -8 -3.582 -8 -8 c 0 -4.418 3.582 -8 8 -8 h 74 c 4.418 0 8 3.582 8 8 C 90 49.418 86.418 53 82 53 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                        </div>
                        <div v-else class="bg-primary-subtle mx-auto rounded-4 p-3 px-4 pb-3 mt-4" style="width: 90%;">
                            <p class="fs-5 m-0 p-0">Klasa - <span class="fw-medium">{{ classroom.name }}</span></p>
                            <p class="p-0 m-0">Wychowawca</p>
                            <p class="p-0 m-0 fw-medium">{{ users.find(ob => ob.id == teachers.find(obj => obj.id === classroom.teacher_id).user_id).name }}</p>
                            <p @click="change(imported.rawShow, classroom.id)" class="mt-2 p-0 m-0 small text-primary text-decoration-underline text-end" role="button">zarządzanie</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">

                </div>
            </div>

        </div>

    </div>
</template>
