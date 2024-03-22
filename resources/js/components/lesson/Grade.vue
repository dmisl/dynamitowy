<script setup>

    import { ref, inject, onMounted, watch } from 'vue'
    import axios from 'axios'

    const imported = inject('imported')
    const loading = ref(true)

    const users = ref([])
    const gradeReasons = ref([])
    const grades = ref([])
    const gradeTypes = ref([])

    const text = ref('')

    onMounted(async () => {
        try {
            // classroom users
            const usersResponse = await axios.get(`http://127.0.0.1:8000/api/classroomUsers/${imported.classroom_id.value}`);
            users.value = usersResponse.data.data
            // grade reasons
            const gradeReasonsResponse = await axios.get(`http://127.0.0.1:8000/api/gradeReasons/${imported.subject_id.value}`);
            gradeReasons.value = gradeReasonsResponse.data.data
            // grades from gradeReasons
            const gradesResponse = await axios.get(`http://127.0.0.1:8000/api/grades/${imported.classroom_id.value}/${imported.subject_id.value}`)
            grades.value = gradesResponse.data.data
            // grade types
            const gradeTypesResponse = await axios.get(`http://127.0.0.1:8000/api/gradeTypes`)
            gradeTypes.value = gradeTypesResponse.data.data
        } catch (error) {
            console.error('Error fetching users data:', error);
        } finally {
            loading.value = false;
        }
    })

    async function createGradeReason()
    {
        try {
            const formData = new FormData();
            formData.append('text', text.value);
            formData.append('subject_id', imported.subject_id.value);
            formData.append('classroom_id', imported.classroom_id.value);
            formData.append('date', new Date().toISOString().split('T')[0]);

            const response = await axios.post('http://127.0.0.1:8000/gradereason/store', formData);
        } catch (error) {
            console.error('Error uploading image:', error);
        }
    }

    function find(array, key1, value1, key2, value2) {
        for (let i = 0; i < array.length; i++) {
            if (array[i][key1] === value1 && array[i][key2] === value2) {
                return array[i];
            }
        }
        return null;
    }

</script>
<template>
    <div>
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
                    <td>{{ user.name }}</td>
                    <td v-for="gradeReason in gradeReasons" class="text-center">
                        {{ gradeTypes[find(grades, 'grade_reason_id', gradeReason.id, 'user_id', user.id).type-1].text }}
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
</template>
