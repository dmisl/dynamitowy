<script setup>

    import { ref, inject, onMounted, watch } from 'vue'
    import axios from 'axios'

    const imported = inject('imported')
    const loading = ref(true)

    const users = ref([])
    const gradeReasons = ref([])

    onMounted(async () => {
        try {
            // classroom users
            const usersResponse = await axios.get(`http://127.0.0.1:8000/api/classroomUsers/${imported.classroom_id.value}`);
            users.value = usersResponse.data.data;
            console.log(users)
            // grade reasons
            const gradeReasonsResponse = await axios.get(`http://127.0.0.1:8000/api/gradeReasons/${imported.subject_id}`);
            gradeReasons.value = gradeReasonsResponse.data.data;

        } catch (error) {
            console.error('Error fetching users data:', error);
        } finally {
            loading.value = false;
        }
    })

</script>
<template>
    <div>
        <table class="table table-primary table-bordered m-0 p-0">
            <thead>
                <tr>
                    <th>Imie Nazwisko</th>
                    <th v-for="gradeReason in gradeReasons">
                        {{ gradeReason.text }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users">
                    <td>{{ user.name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
