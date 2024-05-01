<script setup>

    import { ref, onMounted, inject } from 'vue'
    import axios from 'axios'

    const props = defineProps(['prefix'])

    const loading = ref(true)

    const user = ref([])
    const teachers = ref([])
    const teacherModels = ref([])
    const gradeReasons = ref([])
    const grades = ref([])
    const subjects = ref([])
    const gradeTypes = ref([])
    const classroomLessons = ref([])
    const uniqueLessons = ref([])

    onMounted(async () => {
        try {
            const userResponse = await axios.get(`${props.prefix}api/user/${imported.user_id}`)
            user.value = userResponse.data.data
            const teachersResponse = await axios.get(`${props.prefix}api/teachers`)
            teachers.value = teachersResponse.data.data
            const teacherModelsResponse = await axios.get(`${props.prefix}api/teachersModel`)
            teacherModels.value = teacherModelsResponse.data.data
            const gradeReasonsResponse = await axios.get(`${props.prefix}api/gradeReasons`)
            gradeReasons.value = gradeReasonsResponse.data.data
            const gradesResponse = await axios.get(`${props.prefix}api/user_grades/${user.value.id}`)
            grades.value = gradesResponse.data.data
            const subjectsResponse = await axios.get(`${props.prefix}api/subjects`)
            subjects.value = subjectsResponse.data.data
            const gradeTypesResponse = await axios.get(`${props.prefix}api/gradeTypes`)
            gradeTypes.value = gradeTypesResponse.data.data
            const classroomLessonsResponse = await axios.get(`${props.prefix}api/allClassroomLessons/${user.value.classroom_id}`)
            classroomLessons.value = classroomLessonsResponse.data.data
            uniqueLessons.value = [...new Set(classroomLessons.value.map(lesson => lesson.subject_id))]
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
    const title = inject('title')
    title(`Oceny | Dynamitowy`)

</script>
<template>
    <div class="pb-5">

        <div v-if="loading" style="margin-top: 10vh;">
            <h3 class="fw-light">
                Loading...
            </h3>
        </div>
        <div v-else style="margin-top: 10vh;">

            <div class="text-start mt-5 user-select-none">

                <p @click="change(imported.rawIndex)" class="p-0 m-0 text-primary text-decoration-underline text-center" role="button">Wrócz</p>

                <div class="mt-5 mx-auto" style="width: 80%;" v-for="subject_id in uniqueLessons">
                    <h3 class="fw-light">{{ subjects.find(obj => obj.id === subject_id).name }}</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Ocena</th>
                                <th>Temat oceny</th>
                                <th>Data</th>
                                <th>Nauczyciel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="gradeReason in gradeReasons.filter(obj => obj.subject_id === subject_id && obj.classroom_id === user.classroom_id)" v-if="gradeReasons.filter(obj => obj.subject_id === subject_id && obj.classroom_id === user.classroom_id).length > 0">
                                <td>{{ gradeTypes[grades.find(obj => obj.grade_reason_id === gradeReason.id).type-1].text }}</td>
                                <td>{{ gradeReason.text }}</td>
                                <td>{{ gradeReason.date }}</td>
                                <td>{{ teachers.find(obj => obj.id === teacherModels.find(teacher => teacher.id === subjects.find(subject => subject.id === gradeReason.subject_id).teacher_id).user_id).name }}</td>
                            </tr>
                            <tr v-else>
                                <td colspan="4">
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
