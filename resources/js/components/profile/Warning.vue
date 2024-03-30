<script setup>

    import { ref, onMounted, inject } from 'vue'
    import axios from 'axios'

    const loading = ref(true)

    const user = ref([])
    const users = ref([])
    const warnings = ref([])

    onMounted(async () => {
        try {
            console.clear()
            const userResponse = await axios.get(`http://127.0.0.1:8000/api/user/${imported.user_id}`)
            user.value = userResponse.data.data
            const usersResponse = await axios.get(`http://127.0.0.1:8000/api/users`)
            users.value = usersResponse.data.data
            const warningsResponse = await axios.get(`http://127.0.0.1:8000/api/user_warnings/${user.value.id}`)
            warnings.value = warningsResponse.data.data
            console.log(warnings.value)
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

            <h1 class="ms-3 fw-medium text-start">Uwagi</h1>

            <div class="text-start mt-5 user-select-none">

                <p @click="change(imported.rawIndex)" class="p-0 m-0 text-primary text-decoration-underline text-center" role="button">Wrocz</p>

                <div v-if="warnings.length > 0">

                    <div class="mt-5">

                        <div v-for="warning in warnings" class="bg-secondary-subtle p-3 mt-2 rounded-3">
                            
                            <div class="d-flex">
                                <div class="ms-2">
                                    <h4>Data</h4>
                                    <h5 class="fw-light">{{ warning.date }}</h5>
                                </div>
                                <div style="margin-left: 200px; width: 300px;">
                                    <h4>Opis</h4>
                                    <h5 class="fw-light">
                                        {{ warning.desc }}
                                    </h5>
                                </div>
                                <div style="margin-left: auto; margin-right: 100px;">
                                    <h4>Nauczyciel</h4>
                                    <h5 class="fw-light">
                                        {{ users.find(obj => obj.id == warning.teacher_id).name }}
                                    </h5>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div v-else class="mt-5">
                    <h3 class="fw-light text-center">W tym momencie nie dostales zadnej uwagi</h3>
                </div>

            </div>

        </div>

    </div>
</template>
