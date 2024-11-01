<script setup>

    import axios from 'axios';
    import { ref, onMounted, inject } from 'vue';

    const props = defineProps(['classroom_id', 'pre'])

    const users = ref([])
    const warnings = ref([]);
    const classrooms = ref([]);
    const loading = ref(true);

    const title = inject('title')

    onMounted(async () => {
        try {
            const warningsResponse = await axios.get(`${props.pre}api/classroomWarnings/${props.classroom_id}`);
            warnings.value = warningsResponse.data.data;
            const usersResponse = await axios.get(`${props.pre}api/users`);
            users.value = usersResponse.data.data;
            const classroomsResponse = await axios.get(`${props.pre}api/classrooms`);
            classrooms.value = classroomsResponse.data.data;
        } catch (error) {
            console.error('Error fetching users data:', error);
        } finally {
            loading.value = false;
            title(`Lista uwag klasy ${classrooms.value.find(obj => obj.id == [props.classroom_id]).name} | Dynamitowy`)
        }
    });

    const imported = inject('imported')
    const change = inject('change')

</script>

<template>
    <div>

        <div v-if="loading">
            Loading...
        </div>

        <div v-else>

            <h1 class="fw-medium">Lista uwag klasy</h1>

            <div class="w-100 mx-auto">

                <div v-if="warnings.length >= 1" v-for="warning in warnings" class="w-100 rounded-3 mt-2 mx-auto bg-secondary-subtle border p-2 row justify-content-between">
                    <div class="col">
                        <p class="fs-4 m-0 p-0">Uczen:</p>
                        <p class="fs-5 fw-medium m-0 p-0">{{ users[warning.user_id-1].name }} - {{ classrooms[users[warning.user_id-1].classroom_id-1].name }}</p>
                        <p class="small text-secondary m-0 p-0">{{ warning.date }}</p>
                    </div>
                    <div class="col">
                        <p class="fs-4 m-0 p-0">Opis:</p>
                        <p class="fs-6 fw-medium m-0 p-0 text-wrap">{{ warning.desc }}</p>
                    </div>
                    <div class="col">
                        <a role="button" @click="change(imported.rawShow, warning.user_id, warning.id)" class="text-primary text-underline">Show</a>
                    </div>
                </div>
                <div v-else>
                    <h2 class="fw-light">W tym momencie nikt z twojej klasy nie dostal uwagi</h2>
                </div>

            </div>

        </div>

    </div>
</template>
