<script setup>

    import { ref, onMounted, inject } from 'vue'
    import axios from 'axios'

    const props = defineProps(['prefix'])

    const loading = ref(true)

    const imported = inject('imported')
    const change = inject('change')

    const teachers = ref([])
    const users = ref([])

    onMounted(async () => {
        try {
            const teachersResponse = await axios.get(`${props.prefix}api/teachersModel`)
            teachers.value = teachersResponse.data.data
            const usersResponse = await axios.get(`${props.prefix}api/users`)
            users.value = usersResponse.data.data
        } catch (error) {

        } finally {
            loading.value = false
        }
    })

    const teacher_id = ref(0)

    const title = inject('title')
    title(`Zarządzanie nauczycielami | Dynamitowy`)

</script>

<template>
    <div class="p-3 user-select-none">

        <div v-if="loading">Loading...</div>

        <div v-else class="p-2">

            <h1 class="fw-light">Zarządzanie nauczycielami</h1>

            <div class="col-md-4 offset-4 mt-5">
                <div class="card">
                    <div class="card-body">

                        <div class="mt-2">

                            <label for="teacher" class="form-label fs-4 m-0 p-0">Wybierz nauczyciela</label>
                            <select v-model="teacher_id" id="teacher" class="form-select mt-2">
                                <option v-for="teacher in teachers" :value="teacher.id">{{ users.find(obj => obj.id == teacher.user_id).name }}</option>
                            </select>

                            <div class="text-center mt-4">
                                <button @click="change(imported.rawShow, teacher_id)" class="btn btn-primary" :disabled="!teacher_id">Zarządzanie</button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</template>
