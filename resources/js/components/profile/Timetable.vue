<script setup>

    import { ref, onMounted, inject } from 'vue'
    import axios from 'axios'

    const props = defineProps(['prefix'])

    const loading = ref(true)

    const user = ref([])
    const subjects = ref([])
    const classroomLessons = ref([])
    const teachers = ref([])
    const days = ['Poniedzialek', 'Wtorek', 'Sroda', 'Czwartek', 'Piatek']
    const timetable = ['7:10', '8:00', '8:50', '9:40', '10:30', '11:35', '12:25', '13:15', '14:05', '14:55', '15:45', '16:35']

    onMounted(async () => {
        try {
            const userResponse = await axios.get(`${props.prefix}api/user/${imported.user_id}`)
            user.value = userResponse.data.data
            const subjectsResponse = await axios.get(`${props.prefix}api/subjects`)
            subjects.value = subjectsResponse.data.data
            const classroomLessonsResponse = await axios.get(`${props.prefix}api/allClassroomLessons/${user.value.classroom_id}`)
            classroomLessons.value = classroomLessonsResponse.data.data
            const teachersResponse = await axios.get(`${props.prefix}api/teachers`)
            teachers.value = teachersResponse.data.data
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
    title(`Rozkład lekcji | Dynamitowy`)

</script>
<template>
    <div class="pb-5">

        <div v-if="loading">
            Loading...
        </div>
        <div v-else>

            <h1 class="ms-3 fw-medium text-start">Plan lekcji</h1>

            <div class="text-start mt-5 user-select-none">

                <p @click="change(imported.rawIndex)" class="p-0 m-0 text-primary text-decoration-underline text-center" role="button">Wrócz</p>

                <div class="mt-5 mx-auto" v-for="(day, index) in days" style="width: 80%;">
                    <h3 class="fw-light ps-1">{{ day }}</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Czas</th>
                                <th>Lekcja</th>
                                <th>Nauczyciel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="lesson in classroomLessons.filter(obj => obj.day === index+1)">
                                <td style="width: 100px;">{{ timetable[lesson.lesson_number] }}</td>
                                <td>{{ subjects.find(obj => obj.id === lesson.subject_id).name }}</td>
                                <td>{{ teachers.find(teacher => teacher.id === subjects.find(obj => obj.id === lesson.subject_id).teacher_id+1).name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>
</template>
