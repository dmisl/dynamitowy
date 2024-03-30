<script setup>

    import { ref, onMounted, inject } from 'vue'
    import axios from 'axios'

    const loading = ref(true)

    const user = ref([])
    const gradeReasons = ref([])
    const grades = ref([])
    const subjects = ref([])
    const gradeTypes = ref([])
    const classroomLessons = ref([])

    onMounted(async () => {
        try {
            console.clear()
            const userResponse = await axios.get(`http://127.0.0.1:8000/api/user/${imported.user_id}`)
            user.value = userResponse.data.data
            const gradeReasonsResponse = await axios.get(`http://127.0.0.1:8000/api/gradeReasons`)
            gradeReasons.value = gradeReasonsResponse.data.data
            const gradesResponse = await axios.get(`http://127.0.0.1:8000/api/user_grades/${user.value.id}`)
            grades.value = gradesResponse.data.data
            const subjectsResponse = await axios.get(`http://127.0.0.1:8000/api/subjects`)
            subjects.value = subjectsResponse.data.data
            const gradeTypesResponse = await axios.get(`http://127.0.0.1:8000/api/gradeTypes`)
            gradeTypes.value = gradeTypesResponse.data.data
            const classroomLessonsResponse = await axios.get(`http://127.0.0.1:8000/api/allClassroomLessons/${user.value.classroom_id}`)
            classroomLessons.value = classroomLessonsResponse.data.data
        } catch (error) {
            console.error(error)
        } finally {
            loading.value = false
        }
    })

    function find(array, key1, value1, key2, value2) {
        for (let i = 0; i < array.length; i++) {
            if (array[i][key1] === value1 && array[i][key2] === value2) {
                return array[i];
            }
        }
        return null;
    }

    const imported = inject('imported')
    const change = inject('change')

</script>
<template>
    <div>

        <div v-if="loading">
            Loading...
        </div>
        <div v-else>

            <h1 class="ms-3 fw-medium text-start">Oceny</h1>

            <div class="text-start mt-5 user-select-none">

                <p @click="change(imported.rawIndex)" class="p-0 m-0 text-primary text-decoration-underline text-center" role="button">Wrocz</p>

                <div class="px-4 mt-5" v-for="lesson in classroomLessons">
                    <h4 class="fw-light">{{ subjects.find(obj => obj.id === lesson.subject_id).name }}</h4>
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th>Ocena</th>
                                <th>Temat oceny</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="gradeReason in gradeReasons.filter(obj => obj.subject_id === lesson.subject_id && obj.classroom_id === user.classroom_id)" v-if="gradeReasons.filter(obj => obj.subject_id === lesson.subject_id && obj.classroom_id === user.classroom_id).length > 0">
                                <td>{{ gradeTypes[grades.find(obj => obj.grade_reason_id === gradeReason.id).type-1].text }}</td>
                                <td>{{ gradeReason.text }}</td>
                                <td>{{ gradeReason.date }}</td>
                            </tr>
                            <tr v-else>
                                <td colspan="3">
                                    Brak ocen
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>
</template>
