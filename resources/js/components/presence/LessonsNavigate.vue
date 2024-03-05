<template>
    <div class="m-0 p-0 border-bottom border-dark" v-for="(item, index) in lessons" :key="index" @click="sendDataToChangeTable(item)">
        <p class="p-0 m-0 ps-1 pt-1 fw-medium">{{ item.ClassName }}-{{ item.LessonTime }}</p>
        <p class="p-0 m-0 ps-1 small text-wrap">{{ item.LessonName }}</p>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "Lessonnavigate",
    props: {
        id: String,
    },
    data() {
        return {
            lessons: [],
            error: null, // Added to handle potential errors
        };
    },
    methods: {
        sendDataToChangeTable(x) {
            this.emitter.emit("ChangeTableData", { data: x });
        },
    },
   /**
    * Function to fetch data from the API and update the lessons data in the component.
     *
     * @return {void} 
     */

    mounted() {
        async function fetchData() {
            try {
                const response = await axios.get(`/api/todayLessons/${this.id}`);
                const lessonsApiData = response.data;

                const lessons = await Promise.all(
                    lessonsApiData.map(async (element) => {
                        const { data: classroomData } = await axios.get(`/api/classroom/${element.classroom_id}`);
                        const { data: subjectData } = await axios.get(`/api/subject/${element.subject_id}`);
                        const { data: lessonData } = await axios.get(`/api/lesson/${element.id}`);

                        return {
                            ClassName: classroomData.name,
                            LessonName: subjectData.name,
                            LessonTime: lessonData.time,
                        };
                    })
                );

                this.lessons = lessons;
            } catch (error) {
                console.error("Error fetching data:", error);
                this.error = error; 
            }
        }

        fetchData(); // Call the function to start fetching data
    },
};

</script>