<script setup>

    import { ref, inject, onMounted, watch } from 'vue'
    import axios from 'axios'

    // popovers
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

    const props = defineProps(['classroom_id', 'subject_id'])

    const imported = inject('imported')
    const change = inject('change')
    const loading = ref(true)
    const selected = ref({userId: 0, gradeReasonId: 0, gradeId: 0})

    const users = ref([])
    const gradeReasons = ref([])
    const grades = ref([])
    const gradeTypes = ref([])
    const classroom = ref([])
    const subject = ref([])

    const text = ref('')

    function find(array, key1, value1, key2, value2) {
        for (let i = 0; i < array.length; i++) {
            if (array[i][key1] === value1 && array[i][key2] === value2) {
                return array[i];
            }
        }
        return null;
    }

    const title = inject('title')

    async function getData()
    {
        try {
            // classroom users
            const usersResponse = await axios.get(`http://127.0.0.1:8000/api/classroomUsers/${props.classroom_id}`);
            users.value = usersResponse.data.data
            // grade reasons
            const gradeReasonsResponse = await axios.get(`http://127.0.0.1:8000/api/classroomGradeReasons/${props.classroom_id}/${props.subject_id}`);
            gradeReasons.value = gradeReasonsResponse.data.data
            // grades from gradeReasons
            const gradesResponse = await axios.get(`http://127.0.0.1:8000/api/grades/${props.classroom_id}/${props.subject_id}`)
            grades.value = gradesResponse.data.data
            // grade types
            const gradeTypesResponse = await axios.get(`http://127.0.0.1:8000/api/gradeTypes`)
            gradeTypes.value = gradeTypesResponse.data.data
            // selecting first user/grade/gradeReason
            if(users.value.length > 0 && gradeReasons.value.length > 0)
            {
                selected.value.userId = users.value[0].id
                selected.value.gradeReasonId = gradeReasons.value[0].id
                selected.value.gradeId = find(grades.value, 'user_id', selected.value.userId, 'grade_reason_id', selected.value.gradeReasonId).id
            }
            // classroom and subject
            const classroomResponse = await axios.get(`http://127.0.0.1:8000/api/classroom/${props.classroom_id}`)
            classroom.value = classroomResponse.data.data
            const subjectResponse = await axios.get(`http://127.0.0.1:8000/api/subject/${props.subject_id}`)
            subject.value = subjectResponse.data.data
        } catch (error) {
            console.error('Error fetching users data:', error);
        } finally {
            loading.value = false;
            title(`Oceny ${classroom.value.name} z ${subject.value.name} | Dynamitowy`)
        }
    }

    onMounted(async () => {
        getData()
    })

    function select(user_id, grade_reason_id = 0)
    {
        selected.value.userId = user_id
        selected.value.gradeReasonId = grade_reason_id
        selected.value.gradeId = find(grades.value, 'user_id', selected.value.userId, 'grade_reason_id', selected.value.gradeReasonId).id
    }

    async function updateGrade(type)
    {
        try {
            const formData = new FormData();
            formData.append('type', type);
            formData.append('id', selected.value.gradeId);

            const response = await axios.post('http://127.0.0.1:8000/grade/update', formData);

            grades.value.find(obj => obj.id === selected.value.gradeId).type = type;
            select(users.value[users.value.findIndex(obj => obj.id === selected.value.userId)+1].id, selected.value.gradeReasonId)

        } catch (error) {
            console.error('Error uploading image:', error);
        }
    }

    async function createGradeReason()
    {
        try {
            const formData = new FormData();
            formData.append('text', text.value);
            formData.append('subject_id', props.subject_id);
            formData.append('classroom_id', props.classroom_id);
            formData.append('date', new Date().toISOString().split('T')[0]);

            const response = await axios.post('http://127.0.0.1:8000/gradereason/store', formData);

            getData()
        } catch (error) {
            console.error('Error uploading image:', error);
        }
    }

</script>
<template>
    <div>

        <div v-if="loading">
        </div>

        <div v-else>

            <div class="bg-warning p-2 rounded-2 user-select-none" style="position: fixed; bottom: 0; right: 0; width: 300px;">
                <h3 class="fw-light my-2">Wybierz ucznia</h3>
                <div class="w-100 bg-primary-subtle p-2 text-center fw-light border border-dark">
                    <p class="p-0 m-0 fs-5">Oceny</p>
                </div>
                <div class="row w-100 mx-auto">
                    <div v-for="gradeType in gradeTypes" @click="updateGrade(gradeType.id)" class="col-md-4 text-center border border-dark p-1 small bg-warning-subtle">{{ gradeType.text }}</div>
                </div>
            </div>

            <a role="button" @click="change(imported.rawGrade)" class="d-flex ms-2 my-2">
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

            <table class="table table-primary table-bordered m-0 p-0 user-select-none">
                <thead>
                    <tr>
                        <th>Imie Nazwisko</th>
                        <th v-for="gradeReason in gradeReasons">
                            {{ gradeReason.text }}
                        </th>
                        <th class="table-success text-dark fw-medium text-center" data-bs-toggle="modal" data-bs-target="#addModal" role="button">+Dodac temat oceny+</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users">
                        <td :class="{ 'bg-primary' : selected.userId == user.id }">{{ user.name }}</td>
                        <td v-for="gradeReason in gradeReasons" @click="select(user.id, gradeReason.id)" class="text-center" :class="{ 'bg-primary' : selected.gradeReasonId == gradeReason.id && selected.userId == user.id }">
                            {{ gradeTypes[find(grades, 'grade_reason_id', gradeReason.id, 'user_id', user.id) ? find(grades, 'grade_reason_id', gradeReason.id, 'user_id', user.id).type-1 : 0] ? gradeTypes[find(grades, 'grade_reason_id', gradeReason.id, 'user_id', user.id) ? find(grades, 'grade_reason_id', gradeReason.id, 'user_id', user.id).type-1 : 0].text : '' }}
                        </td>
                        <td class="text-center" data-bs-toggle="modal" data-bs-target="#addModal" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 256 256" xml:space="preserve">
                                <defs>
                                </defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 45 90 C 20.187 90 0 69.813 0 45 C 0 20.187 20.187 0 45 0 c 24.813 0 45 20.187 45 45 C 90 69.813 69.813 90 45 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(78,188,59); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45 70.454 c -2.761 0 -5 -2.238 -5 -5 V 24.545 c 0 -2.761 2.239 -5 5 -5 c 2.762 0 5 2.239 5 5 v 40.909 C 50 68.216 47.762 70.454 45 70.454 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 65.454 50 H 24.545 c -2.761 0 -5 -2.238 -5 -5 c 0 -2.761 2.239 -5 5 -5 h 40.909 c 2.762 0 5 2.239 5 5 C 70.454 47.762 68.216 50 65.454 50 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Dodac temat oceny</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="p-2">
                                <label for="desc" class="ms-1 fs-5">Podaj przyczyne oceny</label>
                                <input v-model="text" class="form-control mt-1" type="text" id="desc">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="createGradeReason">Zapisz</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
