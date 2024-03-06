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
      lessons: [], // Initialize the lessons array directly
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
          LessonName: subjectResponse.data.data.name,
          ClassName: classroomResponse.data.data.name,
          LessonTime: this.lessontimetable[lessonTimeResponse.data.data.lesson_number], // Assuming lessontimetable is no longer needed
        };
      });

      const processedLessons = await Promise.all(subjectClassroomLessonPromises);
      this.lessons = processedLessons;

      this.emitter.emit("ChangeTableData", { data: processedLessons }); // Emit data only once after processing
    } catch (error) {
      console.error("Error fetching lesson data:", error);
      // Handle errors appropriately, e.g., display an error message to the user
    }
  },
};


</script>