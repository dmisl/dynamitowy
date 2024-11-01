<script setup>

    import { ref, onMounted, inject } from 'vue'
    import axios from 'axios';

    const props = defineProps(['warning_id', 'prefix'])

    const loading = ref(true)

    const user = ref([])
    const teacher = ref([])
    const warning = ref([])

    // editing
    const classrooms = ref([])
    const classroomUsers = ref([])

    const classroom_id = ref(0)
    const user_id = ref(0)
    const desc = ref('')

    async function getData()
    {
        loading.value = true
        try {
            // showing data
            const warningResponse = await axios.get(`${props.prefix}api/warning/${props.warning_id}`)
            warning.value = warningResponse.data.data
            const teacherResponse = await axios.get(`${props.prefix}api/teacher/${warning.value.teacher_id}`)
            teacher.value = teacherResponse.data.data
            const teacherUserResponse = await axios.get(`${props.prefix}api/user/${teacher.value.user_id}`)
            teacher.value = teacherUserResponse.data.data
            const userResponse = await axios.get(`${props.prefix}api/user/${warning.value.user_id}`)
            user.value = userResponse.data.data

            // editing
            classroom_id.value = warning.value.classroom_id
            user_id.value = warning.value.user_id
            desc.value = warning.value.desc
            getEditingData()
        } catch (error)
        {
            console.error(error)
        } finally
        {
            loading.value = false
        }
    }

    onMounted(async () => {
        getData()
    })

    async function getEditingData()
    {
        try {
            // editing

            const classroomsResponse = await axios.get(`${props.prefix}api/classrooms`)
            classrooms.value = classroomsResponse.data.data
            if(classroom_id.value)
            {
                const classroomUsersResponse = await axios.get(`${props.prefix}api/classroomUsers/${classroom_id.value}`)
                classroomUsers.value = classroomUsersResponse.data.data
            }
        } catch (error)
        {
            console.error(error)
        } finally
        {
            loading.value = false
        }
    }

    async function updateWarning()
    {
        try {
            const formData = new FormData();
            formData.append('id', warning.value.id);
            formData.append('user_id', user_id.value);
            formData.append('classroom_id', classroom_id.value);
            formData.append('desc', desc.value);

            const response = await axios.post(`${props.prefix}warning/update`, formData);

        } catch (error) {
            console.error('Error uploading image:', error);
        } finally
        {
            getData()
        }
    }

    async function deleteWarning()
    {
        try {
            const formData = new FormData();
            formData.append('id', warning.value.id);

            const response = await axios.post(`${props.prefix}warning/delete`, formData);

        } catch (error) {
            console.error('Error uploading image:', error);
        } finally
        {
            change(imported.rawIndex)
        }
    }

    const imported = inject('imported')
    const change = inject('change')
    const title = inject('title')
    title(`Zarządzanie uwagą | Dynamitowy`)

</script>

<template>
    <div class="user-select-none">

        <div class="p-3">

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

                <h1 class="fw-light">Zarządzanie uwagą</h1>

                <div class="d-flex mt-5">

                    <div>

                        <h3 class="fw-light m-0 p-0">Imie nazwisko ucznia</h3>
                        <h4 class="fw-medium">{{ user.name }}</h4>

                        <h3 class="fw-light m-0 p-0 mt-3">Nadano przez nauczyciela</h3>
                        <h4 class="fw-medium">{{ teacher.name }}</h4>

                        <h3 class="fw-light m-0 p-0 mt-3">Data stworzenia</h3>
                        <h4 class="fw-medium">{{ warning.date }}</h4>

                        <h3 class="fw-light m-0 p-0 mt-3">Treść uwagi</h3>
                        <h4 class="fw-medium">{{ warning.desc }}</h4>

                    </div>
                    <div class="border rounded-3 p-3 pb-4 ms-5" style="align-self: flex-start;">
                        <h5 class="fw-medium">Zarządzanie</h5>
                        <p class="text-primary text-decoration-underline p-0 m-0 mt-1" data-bs-toggle="modal" data-bs-target="#editModal" role="button">Edytować</p>
                        <p class="text-danger text-decoration-underline" data-bs-toggle="modal" data-bs-target="#deleteModal" role="button">Usunąć</p>
                    </div>

                </div>

                <!-- editing modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edytowanie uwagi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="p-2">
                                    <div class="mb-3">

                                        <div class="mt-1">
                                            <label for="classroom" class="form-label p-0 m-0">Klasa</label>
                                            <select v-model="classroom_id" @change="getEditingData" class="form-select form-select-sm" id="classroom">
                                                <option v-for="classroom in classrooms" :value="classroom.id" :selected="classroom.id == warning.classroom_id">{{ classroom.name }}</option>
                                            </select>
                                        </div>

                                        <div v-if="classroom_id" class="mt-1">
                                            <label for="student" class="form-label p-0 m-0">Uczeń</label>
                                            <select v-model="user_id" class="form-select form-select-sm" id="student">
                                                <option v-for="user in classroomUsers" :value="user.id" :selected="user.id == warning.user_id">{{ user.name }}</option>
                                            </select>
                                        </div>

                                        <div v-if="classroom_id && user_id" class="mt-2">
                                            <label for="desc" class="form-label p-0 m-0">Opis</label>
                                            <textarea v-model="desc" class="form-control" style="font-size: 0.875em !important;" id="desc" rows="2"></textarea>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Zamknij</button>
                                <button @click="updateWarning" :disabled="!classroom_id || !user_id || !desc" type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Zapisać</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- deleting modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Usunięcie uwagi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="p-2">
                                    <div class="mb-3">

                                        <h4>Napewno chcesz usunąć uwagę?</h4>

                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Nie</button>
                                <button @click="deleteWarning" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Tak</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</template>
