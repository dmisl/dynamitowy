<script setup>

    import { ref, onMounted, inject } from 'vue'
    import axios from 'axios'

    const props = defineProps(['prefix'])

    const loading = ref(true)

    const classrooms = ref([])
    const lessons = ref([])
    const subjects = ref([])

    const classroom_id = ref(0)
    const lesson_id = ref(0)
    const date = ref(0)

    onMounted(async () => {
        getData()
    })

    async function getData()
    {

        loading.value = true
        try {
            const classroomsResponse = await axios.get(`${props.prefix}api/classrooms`)
            classrooms.value = classroomsResponse.data.data
            if(classroom_id.value && date.value)
            {
                const day = new Date(date.value).getDay()
                const lessonsResponse = await axios.get(`${props.prefix}api/classroomLessons/${classroom_id.value}/${day}`)
                lessons.value = lessonsResponse.data.data
                const subjectsResponse = await axios.get(`${props.prefix}api/subjects`)
                subjects.value = subjectsResponse.data.data
            }
            lesson_id.value = 0
        } catch (error) {
            console.error(error)
        } finally {
            loading.value = false
        }
    }

    const changePresence = inject('changePresence')

    const title = inject('title')
    title(`Obecność | Dynamitowy`)

</script>

<template>
    <div class="user-select-none">

        <div class="p-3">

            <h2 class="fw-light">Obecność</h2>

            <div class="mt-5 ms-3">

                <div v-if="loading"></div>

                <div v-else>

                    <div class="card col-md-4 offset-4">
                        <div class="card-body">

                            <div>
                                <label for="classroom" class="form-label fs-4 m-0 p-0">Klasa</label>
                                <select v-model="classroom_id" @change="getData" class="form-select" id="classroom">
                                    <option v-for="classroom in classrooms" :value="classroom.id" :selected="classroom.id == classroom_id">{{ classroom.name }}</option>
                                </select>
                            </div>

                            <div v-if="classroom_id" class="mt-2">
                                <label for="date" class="form-label fs-4 m-0 p-0">Data</label><br>
                                <input v-model="date" @change="getData" class="w-100" type="date" id="date">
                            </div>

                            <div v-if="date" class="mt-2">
                                <label for="subject" class="form-label fs-4 m-0 p-0">Przedmiot</label>
                                <select v-model="lesson_id" class="form-select" id="subject">
                                    <option v-for="lesson in lessons" :value="lesson.id">{{ subjects.find(obj => obj.id === lesson.subject_id).name }}</option>
                                </select>
                            </div>

                            <div v-if="classroom_id && lesson_id && date" class="text-center">
                                <button @click="changePresence(classroom_id, lesson_id, date)" class="btn btn-primary mt-4">
                                    Znajdż
                                </button>
                            </div>

                        </div>
                    </div>

                </div>


            </div>

        </div>

    </div>
</template>

<style scoped>

input[type="date"]{
    background-color: #0080ff;
    padding: 5px;
    font-family: "Roboto Mono",monospace;
    color: #ffffff;
    font-size: 18px;
    border: none;
    outline: none;
    border-radius: 5px;
}
::-webkit-calendar-picker-indicator{
    background-color: #ffffff;
    padding: 5px;
    cursor: pointer;
    border-radius: 3px;
}

</style>
