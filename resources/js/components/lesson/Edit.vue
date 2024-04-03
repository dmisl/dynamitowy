<script setup>

import { ref, inject, onMounted } from 'vue'
import axios from 'axios'

const imported = inject('imported')
const change = inject('change')
const selected = ref({ userId: 0, lessonId: 0, presenceId: 0 })
const loading = ref(true)

const users = ref([])
const lesson = ref([])
const classroom = ref([])
const classroomLessons = ref([])
const classroomPresence = ref([])
const presenceTypes = ref([])

const title = inject('title')

onMounted(async () => {
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

        // selecting first user and current lesson
        selected.value.userId = users.value[0].id
        selected.value.lessonId = lesson.value.id
        selected.value.presenceId = find(classroomPresence.value, 'user_id', selected.value.userId, 'lesson_id', selected.value.lessonId).id

    } catch (error) {
        console.error('Error fetching users data:', error);
    } finally {
        title(`Edytowanie obecności klasy ${classroom.value.name} ${imported.date.value} | Dynamitowy`)
        loading.value = false;
    }
});

// functions

    function find(array, key1, value1, key2, value2) {
        for (let i = 0; i < array.length; i++) {
            if (array[i][key1] === value1 && array[i][key2] === value2) {
                return array[i];
            }
        }
        return null;
    }

    function select(userId)
    {
        selected.value.userId = userId
        selected.value.presenceId = find(classroomPresence.value, 'user_id', selected.value.userId, 'lesson_id', selected.value.lessonId).id
    }

    async function updateSelected(type)
    {
        try {
            const formData = new FormData();
            formData.append('id', selected.value.presenceId);
            formData.append('type', type);

            const response = await axios.post('http://127.0.0.1:8000/journal/lesson/update', formData);

            classroomPresence.value.find(obj => obj.id === selected.value.presenceId).presence_type_id = type;
            select(users.value[users.value.findIndex(obj => obj.id === selected.value.userId)+1].id)

        } catch (error) {
            console.error('Error uploading image:', error);
        }
    }

</script>
<template>
    <div>
        <div v-if="loading" class="p-5">
            Loading...
        </div>
        <div v-else>

            <div class="bg-warning p-2 rounded-2 user-select-none" style="position: fixed; bottom: 0; right: 0;">
                <h3 class="fw-light my-2">Wybierz ucznia</h3>
                <table class="table table-primary table-bordered">
                    <tbody>
                        <tr>
                            <td>typ</td>
                            <td class="text-center">symbol</td>
                        </tr>
                        <tr v-for="presenceType in presenceTypes">
                            <td>{{ presenceType.desc }}</td>
                            <td role="button" @click="updateSelected(presenceType.id)" class="text-center" v-html="presenceType.text"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <table class="table table-primary table-bordered m-0 p-0 user-select-none">
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
                        <td v-for="lesson in classroomLessons" @click="select(user.id)" :class="{ 'table-success' : lesson.id == imported.lesson_id.value, 'bg-success' : selected.userId == user.id && selected.lessonId == lesson.id }">
                            <div class="text-center" v-html="presenceTypes[find(classroomPresence, 'user_id', user.id, 'lesson_id', lesson.id).presence_type_id-1].text"></div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>
