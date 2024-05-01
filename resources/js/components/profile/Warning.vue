<script setup>

    import { ref, onMounted, inject } from 'vue'
    import axios from 'axios'

    const props = defineProps(['prefix'])

    const loading = ref(true)

    const user = ref([])
    const users = ref([])
    const warnings = ref([])

    onMounted(async () => {
        try {
            const userResponse = await axios.get(`${props.prefix}api/user/${imported.user_id}`)
            user.value = userResponse.data.data
            const usersResponse = await axios.get(`${props.prefix}api/users`)
            users.value = usersResponse.data.data
            const warningsResponse = await axios.get(`${props.prefix}api/user_warnings/${user.value.id}`)
            warnings.value = warningsResponse.data.data
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
    title(`Lista uwag | Dynamitowy`)

</script>
<template>
    <div>

        <div v-if="loading" style="margin-top: 10vh;">
            <h3 class="fw-light">
                Loading...
            </h3>
        </div>
        <div v-else>

            <div class="text-start user-select-none" style="margin-top: 10vh;">

                <p @click="change(imported.rawIndex)" class="p-0 m-0 text-primary text-decoration-underline text-center" role="button">Wrócz</p>

                <div v-if="warnings.length > 0">

                    <div class="mt-5">

                        <div v-for="warning in warnings" class="p-3 mt-2 mx-auto" style="width: 80%; border-radius: 20px; background-color: #ed7f8ac7;">

                            <div class="d-flex px-5 pt-1">
                                <div>
                                    <h4>Data</h4>
                                    <h5 class="fw-light">{{ warning.date }}</h5>
                                </div>
                                <div style="margin-left: 200px;">
                                    <h4>Opis</h4>
                                    <h5 class="fw-light">
                                        {{ warning.desc }}
                                    </h5>
                                </div>
                                <div style="margin-left: auto;">
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
