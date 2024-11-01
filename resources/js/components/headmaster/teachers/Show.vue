<script setup>

    import { ref, onMounted, inject, watch } from 'vue'
    import axios from 'axios'

    const props = defineProps(['prefix'])

    const loading = ref(true)

    const teacher = ref([])
    const user = ref([])
    const subjects = ref([])
    const classroom = ref([])

    const title = inject('title')

    const imported = inject('imported')
    const change = inject('change')
    const getParentData = inject('getParentData')

    async function getData()
    {
        loading.value = true
        try {
            const teacherResponse = await axios.get(`${props.prefix}api/teacher/${imported.teacher_id.value}`)
            teacher.value = teacherResponse.data.data
            const userResponse = await axios.get(`${props.prefix}api/user/${teacher.value.user_id}`)
            user.value = userResponse.data.data
            const subjectsResponse = await axios.get(`${props.prefix}api/teacher_subjects/${teacher.value.id}`)
            subjects.value = subjectsResponse.data.data
            const classroomResponse = await axios.get(`${props.prefix}api/has_classroom/${teacher.value.id}`)
            classroom.value = classroomResponse.data.data
            updatedUser.value.name = user.value.name
            updatedUser.value.email = user.value.email
        } catch (error) {
            console.error(error)
        } finally {
            title(`Zarządzanie nauczycielem ${user.value.name} | Dynamitowy`)
            loading.value = false
        }
    }

    onMounted(async () => {
        getData()
    })

    watch(imported.teacher_id, () => { getData() })

    const subject_name = ref('')

    async function addSubject()
    {
        try {
            const formData = new FormData()
            formData.append('name', subject_name.value)
            formData.append('teacher_id', teacher.value.id)

            const response = await axios.post(`${props.prefix}subject/store`, formData)

            console.log(response.data)

        } catch (error) {
            console.error(error)
        } finally {
            getData()
        }
    }

    const updatedUser = ref({name: '', email: ''})

    async function updateTeacher()
    {
        try {
            const formData = new FormData()
            formData.append('id', teacher.value.user_id)
            formData.append('name', updatedUser.value.name)
            formData.append('email', updatedUser.value.email)

            const response = await axios.post(`${props.prefix}teacher/update`, formData)

        } catch (error) {
            console.error(error)
        } finally {
            getData()
        }
    }

    async function deleteTeacher()
    {
        try {
            const formData = new FormData()
            formData.append('id', teacher.value.user_id)

            const response = await axios.post(`${props.prefix}teacher/delete`, formData)

            getParentData()

            change(imported.rawIndex)

        } catch (error) {
            console.error(error)
        } finally {

        }
    }

</script>
<template>
    <div class="p-3 user-select-none">

        <a role="button" @click="change(imported.rawIndex)" class="d-flex ms-2 my-2">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="21" height="21" viewBox="0 0 256 256" xml:space="preserve">
                <defs>
                </defs>
                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                    <circle cx="45" cy="45" r="45" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(32,196,203); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) "/>
                    <path d="M 70.191 51.154 H 13.5 c -1.169 0 -2.232 -0.68 -2.723 -1.741 s -0.32 -2.312 0.438 -3.203 l 18.258 -21.462 c 1.074 -1.262 2.967 -1.414 4.229 -0.341 c 1.262 1.074 1.415 2.967 0.341 4.229 L 19.991 45.154 h 50.201 c 1.657 0 3 1.343 3 3 S 71.849 51.154 70.191 51.154 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(27,167,173); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    <path d="M 31.759 72.617 c -0.849 0 -1.693 -0.358 -2.287 -1.057 L 11.215 50.098 c -0.758 -0.891 -0.929 -2.141 -0.438 -3.202 s 1.554 -1.741 2.723 -1.741 h 56.691 c 1.657 0 3 1.343 3 3 s -1.343 3 -3 3 H 19.991 l 14.052 16.52 c 1.073 1.262 0.921 3.155 -0.341 4.229 C 33.137 72.383 32.446 72.617 31.759 72.617 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(27,167,173); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    <path d="M 73.5 47.846 H 16.809 c -1.169 0 -2.232 -0.68 -2.723 -1.741 s -0.32 -2.312 0.438 -3.203 l 18.257 -21.462 c 1.072 -1.262 2.967 -1.416 4.229 -0.341 c 1.262 1.074 1.415 2.967 0.341 4.229 L 23.299 41.846 H 73.5 c 1.657 0 3 1.343 3 3 C 76.5 46.503 75.157 47.846 73.5 47.846 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    <path d="M 35.067 69.309 c -0.85 0 -1.693 -0.358 -2.287 -1.057 L 14.523 46.789 c -0.758 -0.891 -0.929 -2.141 -0.438 -3.202 s 1.554 -1.741 2.723 -1.741 H 73.5 c 1.657 0 3 1.343 3 3 c 0 1.657 -1.343 3 -3 3 H 23.299 l 14.052 16.52 c 1.073 1.262 0.921 3.155 -0.341 4.229 C 36.445 69.074 35.754 69.309 35.067 69.309 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                </g>
            </svg>
            <div class="d-table ms-1">
                <p class="d-table-cell align-middle m-0 p-0 small">Wrocz</p>
            </div>
        </a>

        <div v-if="loading">Loading...</div>

        <div v-else class="p-2">

            <h1 class="fw-light">Zarządzanie nauczycielem</h1>

            <div class="p-1">

                <div class="d-flex mt-3">

                    <div>
                        <h3 class="fw-light">Imie Nazwisko</h3>
                        <h4>{{ user.name }}</h4>

                        <h3 class="fw-light mt-3">Email</h3>
                        <h4>{{ user.email }}</h4>

                        <h3 class="fw-light mt-3">Przedmioty</h3>
                        <h5 v-for="subject in subjects" v-if="subjects.length > 0">- {{ subject.name }}</h5>
                        <h5 v-else>Brak</h5>
                        <h5 class="text-success text-decoration-underline" data-bs-toggle="modal" data-bs-target="#addModal" role="button">Dodać przedmiot</h5>

                        <h3 class="fw-light mt-3">Wychowawca klasy</h3>
                        <h4>{{ classroom.length == 0 ? 'Brak' : classroom.name }}</h4>
                    </div>

                    <div class="border rounded-3 p-3 pb-4 ms-5" style="align-self: flex-start;">

                        <h5 class="fw-medium">Zarządzanie</h5>
                        <p class="text-primary text-decoration-underline p-0 m-0 mt-1" data-bs-toggle="modal" data-bs-target="#editModal" role="button">Edytować</p>
                        <p class="text-danger text-decoration-underline" data-bs-toggle="modal" data-bs-target="#deleteModal" role="button">Usunąć</p>

                    </div>

                </div>

                <!-- add subject modal -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Dodawanie przedmiotu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="p-2">
                                    <div class="mb-3">

                                        <div class="mt-1">
                                            <label for="name" class="form-label p-0 m-0">Nazwa przedmiotu</label>
                                            <input v-model="subject_name" id="name" class="form-control form-control-sm">
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Zamknij</button>
                                <button @click="addSubject" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Dodaj</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- editing modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edytowanie</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="p-2">
                                    <div class="mb-3">

                                        <div class="mt-1">
                                            <label for="name" class="form-label p-0 m-0">Imie Nazwisko</label>
                                            <input v-model="updatedUser.name" id="name" class="form-control form-control-sm">
                                        </div>

                                        <div class="mt-1">
                                            <label for="email" class="form-label p-0 m-0">Email</label>
                                            <input v-model="updatedUser.email" id="email" class="form-control form-control-sm">
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Zamknij</button>
                                <button @click="updateTeacher" :disabled="!updatedUser.name || !updatedUser.email" type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Zapisać</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- deleting modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Usunięcie nauczyciela</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="p-2">
                                    <div class="mb-3">

                                        <h4>Napewno chcesz usunąć nauczyciela i wszytkie przedmioty które on prowadzi?</h4>

                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Nie</button>
                                <button @click="deleteTeacher" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Tak</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</template>
