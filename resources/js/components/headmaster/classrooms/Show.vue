<script setup>

    import { ref, onMounted, inject, watch } from 'vue'
    import axios from 'axios'

    const props = defineProps(['prefix'])

    const loading = ref(true)
    const days = ['Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek']
    const timetable = ['7:10', '8:00', '8:50', '9:40', '10:30', '11:35', '12:25', '13:15', '14:05', '14:55', '15:45', '16:35']

    const imported = inject('imported')
    const change = inject('change')

    const classroom = ref([])
    const users = ref([])
    const allUsers = ref([])
    const teachers = ref([])
    const lessons = ref([])
    const subjects = ref([])

    const teacher_id = ref(0)

    const title = inject('title')

    async function getData()
    {
        loading.value = true
        try {
            const classroomResponse = await axios.get(`${props.prefix}api/classroom/${imported.classroom_id.value}`)
            classroom.value = classroomResponse.data.data
            const usersResponse = await axios.get(`${props.prefix}api/classroomUsers/${classroom.value.id}`)
            users.value = usersResponse.data.data
            const allUsersResponse = await axios.get(`${props.prefix}api/users`)
            allUsers.value = allUsersResponse.data.data
            const teachersResponse = await axios.get(`${props.prefix}api/teachersModel`)
            teachers.value = teachersResponse.data.data
            const classroomLessons = await axios.get(`${props.prefix}api/allClassroomLessons/${classroom.value.id}`)
            lessons.value = classroomLessons.data.data
            teacher_id.value = classroom.value.teacher_id
            const subjectsResponse = await axios.get(`${props.prefix}api/subjects`)
            subjects.value = subjectsResponse.data.data
        } catch (error) {

        } finally {
            loading.value = false
            title(`Zarządzanie klasą ${classroom.value.name} | Dynamitowy`)
        }
    }

    watch(imported.classroom_id, () => { getData() })

    onMounted(async () => {
        getData()
    })

    async function changeClassroomTeacher()
    {
        try {
            const formData = new FormData();
            formData.append('teacher_id', teacher_id.value);
            formData.append('classroom_id', classroom.value.id);

            const response = await axios.post(`${props.prefix}classroom/teacher_update`, formData);

        } catch (error) {
            console.error(error);
        }
    }

    function find(obj, key1, value1, key2, value2) {
        for (const prop in obj) {
            if (typeof obj[prop] === 'object') {
                if (find(obj[prop], key1, value1, key2, value2)) {
                    return true;
                }
                } else if (prop === key1 && obj[prop] === value1) {
                if (obj[key2] === value2) {
                    return true;
                }
            }
        }
        return false;
    }

    async function changeTimetable(event)
    {
        const el = event.target
        try {
            const formData = new FormData();
            formData.append('classroom_id', classroom.value.id);
            formData.append('subject_id', el.value);
            formData.append('day', el.attributes.day.value);
            formData.append('lesson_number', el.attributes.lesson_number.value);

            const response = await axios.post(`${props.prefix}classroom/timetable_update`, formData);

        } catch (error) {
            console.error(error);
        }
    }

    const newUser = ref({name: '', email: '', photo: ''})

    async function createUser()
    {
        try {
            const formData = new FormData();
            formData.append('name', newUser.value.name);
            formData.append('email', newUser.value.email);
            formData.append('classroom_id', classroom.value.id);
            formData.append('photo', newUser.value.photo);

            const response = await axios.post(`${props.prefix}classroom/store`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            newUser.value = {}

            getData()

        } catch (error) {
            console.error('Error uploading image:', error);
        }
    };

    const selected_user = ref('')

    async function deleteUser()
    {
        try {

            const formData = new FormData();
            formData.append('id', selected_user.value.id);

            const response = await axios.post(`${props.prefix}classroom/remove`, formData);

            getData()

        } catch (error) {
            console.error('Error uploading image:', error);
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

            <h1 class="fw-light">Zarządzanie klasą {{ classroom.name }}</h1>

            <!-- list of students -->
            <div class="mt-4 px-2">
                <h4 class="fw-light">Lista uczniów</h4>
                <div class="d-flex flex-wrap">

                    <div v-for="user in users" class="user p-2 px-3 m-1 rounded-2" @click="selected_user = user" data-bs-toggle="modal" data-bs-target="#removeModal">
                        {{ user.name }}
                    </div>
                    <div role="button" class="p-2 px-3 m-1 bg-success-subtle rounded-2" data-bs-toggle="modal" data-bs-target="#addModal">Dodać ucznia</div>

                </div>
                <!-- adding user modal -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Dodanie ucznia do klasy {{ classroom.name }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="p-2 small">

                                    <label for="name">Imie Nazwisko</label>
                                    <input @change="(event) => {newUser.name = event.target.value}" id="name" class="form-control form-control-sm" type="text">

                                    <label class="mt-2" for="email">Email</label>
                                    <input @change="(event) => {newUser.email = event.target.value}" id="email" class="form-control form-control-sm" type="text">

                                    <label for="photo"></label>
                                    <input @change="(event) => {newUser.photo = event.target.files[0]}" class="form-control form-control-sm" id="photo" type="file">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                                <button @click="createUser" type="button" class="btn btn-primary" data-bs-dismiss="modal">Dodaj ucznia</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- removing user modal -->
                <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Usunięcie ucznia z klasy</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="p-2 small text-center">

                                    Jesteś pewien że chcesz usunąć ucznia <b>{{ selected_user.name }}</b> z klasy <b>{{ classroom.name }}</b>?

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nie</button>
                                <button @click="deleteUser" type="button" class="btn btn-danger" data-bs-dismiss="modal">Tak</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- class teacher -->
            <div class="mt-4 px-2" style="width: 350px;">
                <h4 class="fw-light">Wychowawca klasy</h4>
                <select v-model="teacher_id" @change="changeClassroomTeacher" class="form-select form-select-sm">
                    <option v-for="teacher in teachers" :value="teacher.id" :selected="teacher.id == classroom.teacher_id">{{ allUsers.find(obj => obj.id == teacher.user_id).name }}</option>
                </select>
            </div>

            <!-- classroom timetable -->
            <div class="mt-4 px-2">
                <h4 class="fw-light">Rozkład lekcji klasy</h4>

                <div class="d-flex flex-wrap">
                    <div class="col-md-4 mb-4" v-for="(day, day_nr) in days">
                        <div class="bg-danger text-light fw-light small p-3 pb-4 rounded-3" style="width: 90%;">
                            <h5 class="m-0 p-0 fw-light text-center">{{ day }}</h5>
                            <div v-for="(time, lesson_number) in timetable">
                                {{ time }}
                                <select @change="changeTimetable" :day="day_nr+1" :lesson_number="lesson_number" class="form-select form-select-sm">
                                    <option value="delete"></option>
                                    <option v-for="subject in subjects" :value="subject.id" :selected="lessons.some(obj => obj.day == day_nr+1 && obj.lesson_number == lesson_number && obj.subject_id == subject.id)">{{ subject.name }} - {{ allUsers.find(obj => obj.id == teachers.find(ob => ob.id == subject.teacher_id).user_id).name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</template>

<style scoped>

    .user
    {
        background-color: #cfe2ff;
        transition: 0.2s;
    }

    .user:hover
    {
        background-color: red;
    }

</style>
