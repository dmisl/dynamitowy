<script setup>

    import { ref, inject, onMounted, watch } from 'vue'
    import axios from 'axios'

    const imported = inject('imported')
    const change = inject('change')
    const loading = ref(true)

    const users = ref([])
    const lesson = ref([])
    const classroom = ref([])
    const classroomLessons = ref([])
    const classroomPresence = ref([])
    const presenceTypes = ref([])

    async function getData()
    {
        loading.value = true
        try {
            // current lesson
            const lessonResponse = await axios.get(`http://127.0.0.1:8000/api/lesson/${imported.lesson_id.value}`);
            lesson.value = lessonResponse.data.data;
            // lesson`s classroom
            const classroomResponse = await axios.get(`http://127.0.0.1:8000/api/classroom/${lesson.value.classroom_id}`);
            classroom.value = classroomResponse.data.data;
            // this lesson`s users
            const usersResponse = await axios.get(`http://127.0.0.1:8000/api/classroomUsers/${lesson.value.classroom_id}`);
            users.value = usersResponse.data.data;
            // those users` lessons and presence today
            const classroomLessonsResponse = await axios.get(`http://127.0.0.1:8000/api/classroomLessons/${lesson.value.classroom_id}/${lesson.value.day}`);
            classroomLessons.value = classroomLessonsResponse.data.data;
            const classroomPresenceResponse = await axios.get(`http://127.0.0.1:8000/api/classroomPresence/${lesson.value.classroom_id}/${lesson.value.day}/${imported.date.value}`)
            classroomPresence.value = classroomPresenceResponse.data.data
            // presence types
            const presenceTypesResponse = await axios.get(`http://127.0.0.1:8000/api/presenceTypes`)
            presenceTypes.value = presenceTypesResponse.data.data
        } catch (error) {
            if (error.response && error.response.status === 429) {
                // Implement exponential backoff and retry logic
                await new Promise(resolve => setTimeout(resolve, 1000)); // Wait for 1 second
                await getData(); // Retry the request
                } else {
                console.error('Error fetching data:', error);
            }
            console.error('Error fetching users data:', error);
        } finally {
            loading.value = false;
        }
    }

    watch(imported.lesson_id, () => { getData() })

    onMounted(async () => {
        getData()
    });

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
        <div v-if="loading" class="p-5">
            Loading...
        </div>
        <div v-else>
            <table class="table table-primary table-bordered m-0 p-0">
                <thead>
                    <tr>
                        <th>Imie Nazwisko</th>
                        <th v-for="lesson in classroomLessons" :class="{ 'table-success' : lesson.id == imported.lesson_id.value }">
                            {{ imported.timetable[lesson.lesson_number] }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users">
                        <td>{{ user.name }}</td>
                        <td v-for="lesson in classroomLessons" :class="{ 'table-success' : lesson.id == imported.lesson_id.value }">
                            <div class="text-center" v-html="presenceTypes[find(classroomPresence, 'user_id', user.id, 'lesson_id', lesson.id).presence_type_id-1].text"></div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex p-3">
                <div @click="change(imported.rawEdit, lesson.id, lesson.classroom_id, lesson.subject_id)" class="btn btn-primary">Edytowac obecnosc</div>
                <div @click="change(imported.rawGrade, lesson.id, lesson.classroom_id, lesson.subject_id)" class="btn btn-primary ms-2">Oceny ({{ classroom.name }})</div>
            </div>
        </div>
    </div>
</template>
