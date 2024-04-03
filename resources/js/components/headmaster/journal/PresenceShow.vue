<script setup>

import { ref, inject, onMounted } from 'vue'
import axios from 'axios'

const props = defineProps(['classroom_id', 'lesson_id', 'date', 'prefix'])

const imported = inject('imported')
const change = inject('change')
const selected = ref({ userId: 0, lessonId: 0, presenceId: 0 })
const loading = ref(true)

const timetable = ['7:10', '8:00', '8:50', '9:40', '10:30', '11:35', '12:25', '13:15', '14:05', '14:55', '15:45', '16:35',]

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
        const lessonResponse = await axios.get(`${props.prefix}api/lesson/${props.lesson_id}`);
        lesson.value = lessonResponse.data.data;
        // lesson`s classroom
        const classroomResponse = await axios.get(`${props.prefix}api/classroom/${lesson.value.classroom_id}`);
        classroom.value = classroomResponse.data.data;
        // this lesson`s users
        const usersResponse = await axios.get(`${props.prefix}api/classroomUsers/${lesson.value.classroom_id}`);
        users.value = usersResponse.data.data;
        // those users` lessons and presence today
        const classroomLessonsResponse = await axios.get(`${props.prefix}api/classroomLessons/${lesson.value.classroom_id}/${lesson.value.day}`);
        classroomLessons.value = classroomLessonsResponse.data.data;
        const day = new Date(props.date).getDay()
        const classroomPresenceResponse = await axios.get(`${props.prefix}api/classroomPresence/${lesson.value.classroom_id}/${lesson.value.day}/${props.date}`)
        classroomPresence.value = classroomPresenceResponse.data.data
        // presence types
        const presenceTypesResponse = await axios.get(`${props.prefix}api/presenceTypes`)
        presenceTypes.value = presenceTypesResponse.data.data

        // selecting first user and current lesson
        selected.value.userId = users.value[0].id
        selected.value.lessonId = lesson.value.id
        selected.value.presenceId = find(classroomPresence.value, 'user_id', selected.value.userId, 'lesson_id', selected.value.lessonId).id

    } catch (error) {
        console.error('Error fetching users data:', error);
    } finally {
        loading.value = false;
        title(`Obecność ${classroom.value.name} ${props.date} | Dynamitowy`)
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

            const response = await axios.post(`${props.prefix}lesson/update`, formData);

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

            <a role="button" @click="change(imported.rawPresence)" class="d-flex ms-2 my-2">
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
                        <th v-for="lesson in classroomLessons" :class="{ 'table-success' : lesson.id == props.lesson_id }">
                            {{ timetable[lesson.lesson_number] }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users">
                        <td>{{ user.name }}</td>
                        <td v-for="lesson in classroomLessons" @click="select(user.id)" :class="{ 'table-success' : lesson.id == props.lesson_id, 'bg-success' : selected.userId == user.id && selected.lessonId == lesson.id }">
                            <div class="text-center" v-html="presenceTypes[find(classroomPresence, 'user_id', user.id, 'lesson_id', lesson.id).presence_type_id-1].text"></div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>
