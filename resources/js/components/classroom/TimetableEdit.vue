<script setup>
    import axios from 'axios';
    import { ref, onMounted } from 'vue';

    const props = defineProps(['classroom_id'])
    const loading = ref(true);
    const today = new Date().getDay() <= 5 ? new Date().getDay() : 1
    const timetable = ['7:10', '8:00', '8:50', '9:40', '10:30', '11:35', '12:25', '13:15', '14:05', '14:55', '15:45', '16:35']

    const classroomLessons1 = ref([])
    const classroomLessons2 = ref([])
    const classroomLessons3 = ref([])
    const classroomLessons4 = ref([])
    const classroomLessons5 = ref([])
    const subjects = ref([])
    const teachers = ref([])

    onMounted(async () => {
        try {
            const classroomLessons1Response = await axios.get(`http://127.0.0.1:8000/api/classroomLessons/${props.classroom_id}/1`);
            classroomLessons1.value = classroomLessons1Response.data.data
            
            teachers.value = teachersResponse.data.data;
        } catch (error) {
            console.error('Error fetching users data:', error);
        } finally {
            loading.value = true;
        }
    });

</script>

<template>
    <div>

        <div v-if="loading">
            Loading..
        </div>

        <div v-else class="p-3">
            
        </div>

    </div>
</template>
