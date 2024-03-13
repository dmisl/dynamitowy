<template>
    <div class="d-inline-block bg-warning rounded-3" style="position: fixed; bottom: 20px; right: 20px;">
        <div class="p-2">
            <h4 style="width: 150px;text-align: center;" class="fw-medium">{{ this.name }}</h4>
            <table class="table table-primary bordered border-dark">
                <tbody>
                    <tr>
                        <td colspan="3" class="p-1 text-center border-end border-dark fs-5">Oceny</td>
                    </tr>
                    <tr>
                        <td v-for="(grade, index) in gradesList.slice(0,3)" :key="index" class="p-1 border-end border-dark"
                        @click="this.changegrades(grade)"
                        >
                            <p class="p-0 m-0">{{ grade }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td v-for="(grade, index) in gradesList.slice(3,6)" :key="index" class="p-1 border-end border-dark"
                        @click="this.changegrades(grade)"
                        >
                            <p class="p-0 m-0">{{grade}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td v-for="(grade, index) in gradesList.slice(6,9)" :key="index" class="p-1 border-end border-dark"
                        @click="this.changegrades(grade)"
                        >
                            <p class="p-0 m-0">{{grade}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td v-for="(grade, index) in gradesList.slice(9,12)" :key="index" class="p-1 border-end border-dark"
                        @click="this.changegrades(grade)"
                        >
                            <p class="p-0 m-0">{{grade}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td v-for="(grade, index) in gradesList.slice(12,15)" :key="index" class="p-1 border-end border-dark"
                        @click="this.changegrades(grade)"
                        >
                            <p class="p-0 m-0">{{grade}}</p>
                        </td>

                    </tr>
                    <tr>
                        <td v-for="(grade, index) in gradesList.slice(15,18)" :key="index" class="p-1 border-end border-dark"
                        @click="this.changegrades(grade)"
                        >
                            <p class="p-0 m-0">{{ grade }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    name: "GradesTableChange",
    data() {
        return {
            studentName: "",
            grade: "",
            gradesList: [
                "6",
                "6-",
                "5",
                "5+",
                "5-",
                "4",
                "4+",
                "4-",
                "3",
                "3+",
                "3-",
                "2",
                "2+",
                "2-",
                "1",
                "1+",
                "np",
                "brak",
            ],
        }
    },
    props: {
        name: String,
    },
    methods: {
        changegrades(x) {

            this.emitter.emit("ChangeGrades", { data: x });
        }
    },
}
</script>