<script setup>

    import { ref, onMounted, inject } from 'vue'
    import axios from 'axios'

    const loading = ref(true)

    const classrooms = ref([])
    const lessons = ref([])
    const subjects = ref([])

    const availableSubjects = ref([])

    const classroom_id = ref(0)
    const subject_id = ref(0)

    onMounted(async () => {
        getData()
    })

    async function getData()
    {
        loading.value = true
        try {
            const classroomsResponse = await axios.get(`http://127.0.0.1:8000/api/classrooms`)
            classrooms.value = classroomsResponse.data.data
            if(classroom_id.value)
            {
                const lessonsResponse = await axios.get(`http://127.0.0.1:8000/api/allClassroomLessons/${classroom_id.value}`)
                lessons.value = lessonsResponse.data.data
                const subjectsResponse = await axios.get(`http://127.0.0.1:8000/api/subjects`)
                subjects.value = subjectsResponse.data.data
                availableSubjects.value = [...new Set(lessons.value.map(lesson => lesson.subject_id))];
            }
        } catch (error) {
            console.error(error)
        } finally {
            loading.value = false
        }
    }

    const changeGrade = inject('changeGrade')

    const title = inject('title')
    title(`Oceny | Dynamitowy`)

</script>

<template>
    <div class="user-select-none">

        <div class="p-3">

            <h2 class="fw-light">Oceny</h2>

            <div class="mt-5 ms-3">

                <div v-if="loading"></div>

                <div v-else>

                    <div class="card col-md-6 offset-3">
                        <div class="card-body">

                            <div>
                                <label for="grade" class="form-label fs-4 m-0 p-0">Klasa</label>
                                <select v-model="classroom_id" @change="getData" class="form-select" id="grade">
                                    <option v-for="classroom in classrooms" :value="classroom.id" :selected="classroom.id == classroom_id">{{ classroom.name }}</option>
                                </select>
                            </div>

                            <div v-if="classroom_id" class="mt-2">
                                <label for="subject" class="form-label fs-4 m-0 p-0">Przedmiot</label>
                                <select v-model="subject_id" class="form-select" id="subject">
                                    <option v-for="subject in availableSubjects" :value="subject">{{ subjects.find(obj => obj.id === subject).name }}</option>
                                </select>
                            </div>
                            <div v-else class="mt-2">
                                <label for="subject" class="form-label fs-4 m-0 p-0">Przedmiot</label>
                                <select class="form-select" id="subject">
                                    <option selected>Najpierw wybierz klase</option>
                                </select>
                            </div>

                            <div v-if="classroom_id && subject_id" class="text-center">
                                <button @click="changeGrade(classroom_id, subject_id)" class="btn btn-primary mt-4">
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
