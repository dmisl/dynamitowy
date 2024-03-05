<template>
    <div class="m-0 p-0 border-bottom border-dark" v-for="(item, index) in lessons" :key="index" @click="this.index">
        <p class="p-0 m-0 ps-1 pt-1 fw-medium">{{ item.ClassName }}-{{ item.LessonTime }}</p>
        <p class="p-0 m-0 ps-1 small text-wrap">{{ item.LessonName }}</p>
    </div>
</template>

<script>
export default {
    name: "Lessonnavigate",
    data() {
        return {
            lessons: [
                { ClassName: "4TIP", LessonTime: "9-40", LessonName: "programowanie Obiektowe" },
                { ClassName: "4TIP", LessonTime: "9-40", LessonName: "programowanie Obiektowe" },
                { ClassName: "4TIP", LessonTime: "9-40", LessonName: "programowanie Obiektowe" },
                { ClassName: "4TIP", LessonTime: "9-40", LessonName: "programowanie Obiektowe" },
                { ClassName: "4TIP", LessonTime: "9-40", LessonName: "programowanie Obiektowe" },
            ]
        }
    },
    methods: {
        sendDataToChangeTable(x){
            this.emitter.emit("ChangeTableData",{data:this.lessons.x})
        }
    },
}
</script>