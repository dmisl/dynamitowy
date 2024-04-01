<script setup>

    import axios from 'axios';
    import { ref, onMounted, inject, watch } from 'vue';

    const props = defineProps(['classroom_id'])

    const users = ref([])
    const warnings = ref([]);
    const classroom = ref([]);
    const loading = ref(true);

    async function getData()
    {
        loading.value = true
        try {
            const warningsResponse = await axios.get(`http://127.0.0.1:8000/api/classroomWarnings/${props.classroom_id}`);
            warnings.value = warningsResponse.data.data;
            const usersResponse = await axios.get(`http://127.0.0.1:8000/api/users`);
            users.value = usersResponse.data.data;
            const classroomResponse = await axios.get(`http://127.0.0.1:8000/api/classroom/${props.classroom_id}`)
            classroom.value = classroomResponse.data.data
        } catch (error) {
            console.error('Error fetching users data:', error);
        } finally {
            loading.value = false;
        }
    }

    onMounted(async () => {
        getData()
    });

    const imported = inject('imported')
    const change = inject('change')

    watch(imported.classroom_id, () => { getData() })

    onMounted(async () => {
        getData()
    });

</script>

<template>
    <div class="p-3 user-select-none">

        <div v-if="loading">
            Loading...
        </div>

        <div v-else>

            <h1 class="fw-light">Lista wszystkich uwag {{ classroom.name }}</h1>

            <div class="w-100 mx-auto mt-4">

                <div v-if="warnings.length >= 1" v-for="warning in warnings" class="w-100 rounded-3 mt-2 mx-auto bg-secondary-subtle border p-2 row justify-content-between">
                    <div class="col">
                        <div class="d-flex align-items-center h-100">
                            <div>
                                <p class="fs-4 m-0 p-0">Uczen:</p>
                                <p class="fs-5 fw-medium m-0 p-0">{{ users[warning.user_id-1].name }} - {{ classroom.name }}</p>
                                <p class="small text-secondary m-0 p-0">{{ warning.date }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center h-100">
                            <div>
                                <p class="fs-4 m-0 p-0">Opis:</p>
                                <p class="fs-6 fw-medium m-0 p-0 text-wrap">{{ warning.desc }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center h-100">
                            <a role="button" @click="change(imported.rawShow, warning.id)" class="text-primary text-underline">Zarządzanie uwagą</a>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <h2 class="fw-light">W tym momencie nie dodano zadnej uwagi do tej klasy</h2>
                </div>

            </div>

        </div>

    </div>
</template>
