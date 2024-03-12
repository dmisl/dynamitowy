<template>

    <div style="height: 100%;">
        <div class="col-md-3 bg-info bg-gradient" style="position: fixed; height: 100vh;">
            <div class="user-select-none">
                <select class="form-select rounded-0">
                    <option value=""></option>
                </select>
                <a class="text-decoration-none text-dark">
                    <div class="m-0 p-0 border-bottom border-dark" v-for="(item, index) in lessons" :key="index"
                        @click="sendDataToChangeTable(item)">
                        <p class="p-0 m-0 ps-1 pt-1 fw-medium">{{ item.ClassName }}-{{ item.LessonTime }}</p>
                        <p class="p-0 m-0 ps-1 small text-wrap">{{ item.LessonName }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>

</template>

<script>
import axios from 'axios';

export default {
    name: "Lessonnavigate",
    props: {
        id: Number,
    },
    data() {
        return {
            lessons: [],
        };
    },
    async mounted() {
        console.log(this.id);

        try {
            const todayLessonsResponse = await axios.get(`/api/todayLessons/${this.id}`);
            const todayLessonsData = todayLessonsResponse.data;

            const subjectClassroomLessonPromises = todayLessonsData.map(async (lesson) => {
                const [subjectResponse, classroomResponse, lessonTimeResponse] = await Promise.all([
                    axios.get(`/api/subject/${lesson.subject_id}`),
                    axios.get(`/api/classroom/${lesson.classroom_id}`),
                    axios.get(`/api/lesson/${lesson.id}`),
                ]);

                return {
                    ClassroomId: lesson.classroom_id,
                    SubjectId: lesson.subject_id,
                    LessonName: subjectResponse.data.data.name,
                    ClassName: classroomResponse.data.data.name,
                    LessonTime: this.lessontimetable[lessonTimeResponse.data.data.lesson_number],

                };
            });

            const processedLessons = await Promise.all(subjectClassroomLessonPromises);
            this.lessons = processedLessons;
            this.emitter.emit("SelectLesson", { data: this.lessons[0] });
        } catch (error) {
            console.error("Error fetching lesson data:", error);
        }
    },
    methods: {
        sendDataToChangeTable(x) {
            console.log(x);
            this.emitter.emit("SelectLesson", { data: x });
        },
    },
};


</script>