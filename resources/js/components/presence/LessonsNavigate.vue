<template>

  <div style="height: 100%;">
    <div class="col-md-3 bg-info bg-gradient" style="position: fixed; height: 100vh;">
        <div class="user-select-none">
            <select class="form-select rounded-0">
                <option value="">{{ todaysDay() }}</option>
            </select>
                <a class="text-decoration-none text-dark">
                  <div class="m-0 p-0 border-bottom border-dark" v-for="(item, index) in lessons" :key="index" @click="sendDataToChangeTable(item)">
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
      lessons: [], // Initialize the lessons array directly
    };
  },
  async mounted() {
    console.log(this.id);

    try {
      const todayLessonsResponse = await axios.get(`/api/todayLessons/${this.id}`);
      const todayLessonsData = todayLessonsResponse.data;

      const subjectClassroomLessonPromises = todayLessonsData.map(async (lesson) => {
        const [subjectResponse, classroomResponse, lessonTimeResponse,classroomLessons] = await Promise.all([
          axios.get(`/api/subject/${lesson.subject_id}`),
          axios.get(`/api/classroom/${lesson.classroom_id}`),
          axios.get(`/api/lesson/${lesson.id}`),
          axios.get(`/api/classroomLessons/${lesson.classroom_id}/${new Date().getDay()}/`),
        ]);

        return {
          ClassroomId: lesson.classroom_id,
          LessonName: subjectResponse.data.data.name,
          ClassName: classroomResponse.data.data.name,
          LessonTime: this.lessontimetable[lessonTimeResponse.data.data.lesson_number], // Assuming lessontimetable is no longer needed
          LessonNumber: lessonTimeResponse.data.data.lesson_number,
          ClassroomLessons : classroomLessons.data
        };
      });

      const processedLessons = await Promise.all(subjectClassroomLessonPromises);
      this.lessons = processedLessons;
      this.emitter.emit("ChangeTableData", { data: this.lessons[0] }); // Emit data only once after processing
    } catch (error) {
      console.error("Error fetching lesson data:", error);
      // Handle errors appropriately, e.g., display an error message to the user
    }
  },
  methods: {
    sendDataToChangeTable(x) {
      this.emitter.emit("ChangeTableData", { data: x });
    },
    todaysDay() {
            const today = new Date();

            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
            const dd = String(today.getDate()).padStart(2, '0');

            return `${yyyy}-${mm}-${dd}`;
        }
  },
};


</script>