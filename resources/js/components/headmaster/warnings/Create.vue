<script setup>

    import { ref, onMounted, inject } from 'vue'
    import axios from 'axios';

    const props = defineProps(['teacher_id', 'prefix'])

    const loading = ref(true)

    const classrooms = ref([])
    const users = ref([])

    const classroom_id = ref(0)
    const user_id = ref(0)
    const desc = ref('')

    async function getData()
    {
        user_id.value = 0
        desc.value = ''
        try {
            const classroomsResponse = await axios.get(`${props.prefix}api/classrooms`)
            classrooms.value = classroomsResponse.data.data
            if(classroom_id.value)
            {
                const usersResponse = await axios.get(`${props.prefix}api/classroomUsers/${classroom_id.value}`)
                users.value = usersResponse.data.data
            }
        } catch (error)
        {
            console.error(error)
        } finally
        {
            loading.value = false
        }
    }

    onMounted(async () => {
        getData()
    })

    async function createWarning()
    {
        try {
            const formData = new FormData();
            formData.append('user_id', user_id.value);
            formData.append('classroom_id', classroom_id.value);
            formData.append('desc', desc.value);
            formData.append('date', new Date().toISOString().split('T')[0]);
            formData.append('teacher_id', props.teacher_id);

            const response = await axios.post(`${props.prefix}warning/store`, formData);

            console.log(response.data.id)

            change(imported.rawShow, response.data.id)

        } catch (error) {
            console.error('Error uploading image:', error);
        }
    }

    const imported = inject('imported')
    const change = inject('change')
    const title = inject('title')
    title(`Tworzenie uwagi | Dynamitowy`)

</script>

<template>
    <div class="user-select-none">

        <div class="p-3">

            <h2 class="fw-light">Tworzenie uwagi</h2>

            <div class="mt-5 ms-3">

                <div v-if="loading">Loading...</div>

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
                                <label for="user" class="form-label fs-4 m-0 p-0">Uczeń</label>
                                <select v-model="user_id" class="form-select" id="user">
                                    <option v-for="user in users" :value="user.id">{{ user.name }}</option>
                                </select>
                            </div>

                            <div v-if="classroom_id && user_id" class="mt-2">
                                <label for="desc" class="form-label fs-4 m-0 p-0">Opis</label>
                                <textarea v-model="desc" class="form-control" id="desc" rows="2"></textarea>
                            </div>

                            <div v-if="classroom_id && user_id && desc" class="text-center mt-3">
                                <button @click="createWarning" class="btn btn-primary">Utwórz</button>
                            </div>

                        </div>
                    </div>

                </div>


            </div>

        </div>

    </div>
</template>
