<template>
    <div>
        <table class="table table-primary table-bordered">
            <tr>
                <th>Imie Nazwisko</th>
                <th v-for="(GradeReason, index) in this.GradeReasons" :key="index" class="text-center">{{ GradeReason }}</th>
                <th class="text-center">Dodac temat oceny</th>
            </tr>
            <tr v-for="(student, index) in this.studentsWithIDKey" :key="index">
                <td>{{ student.user_name }}</td>
                <td v-for="(GradeReason, index) in this.GradeReasons" :key="index"></td>
                <td class="text-center" role="button" data-bs-toggle="modal" data-bs-target="#addModal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                        width="20" height="20" viewBox="0 0 256 256" xml:space="preserve">
                        <defs>
                        </defs>
                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                            transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                            <path
                                d="M 45 90 C 20.187 90 0 69.813 0 45 C 0 20.187 20.187 0 45 0 c 24.813 0 45 20.187 45 45 C 90 69.813 69.813 90 45 90 z"
                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(78,188,59); fill-rule: nonzero; opacity: 1;"
                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path
                                d="M 45 70.454 c -2.761 0 -5 -2.238 -5 -5 V 24.545 c 0 -2.761 2.239 -5 5 -5 c 2.762 0 5 2.239 5 5 v 40.909 C 50 68.216 47.762 70.454 45 70.454 z"
                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path
                                d="M 65.454 50 H 24.545 c -2.761 0 -5 -2.238 -5 -5 c 0 -2.761 2.239 -5 5 -5 h 40.909 c 2.762 0 5 2.239 5 5 C 70.454 47.762 68.216 50 65.454 50 z"
                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        </g>
                    </svg>
                </td>
            </tr>
        </table>
    </div>
    <GradesModalWindow :subject_id="this.subject_id" :classroom_id="this.classroom_id" ></GradesModalWindow>
</template>

<script>
import GradesTableChange from "./GradesTableChange.vue"
import GradesModalWindow from "./GradesModalWindow.vue"
import axios from "axios"
export default {
    name: "GradesTable",
    data() {
        return {

            fakeGrades: [{
                "studentId": 45,
                "GradeReason": "BHP",
                "GradeValue": "3"
            },
            {
                "studentId": 55,
                "GradeReason": "BHP",
                "GradeValue": "5"
            },
            {
                "studentId": 56,
                "GradeReason": "PatauDodik",
                "GradeValue": "brak"
            },
            {
                "studentId": 45,
                "GradeReason": "PatauDodik",
                "GradeValue": "4"
            },
            {
                "studentId": 57,
                "GradeReason": "PatauDodik",
                "GradeValue": "6"
            },
            {
                "studentId": 49,
                "GradeReason": "PatauDodik",
                "GradeValue": "brak"
            },
            {
                "studentId": 47,
                "GradeReason": "BHP",
                "GradeValue": "brak"
            },
            {
                "studentId": 52,
                "GradeReason": "Daun",
                "GradeValue": "5"
            },
            {
                "studentId": 56,
                "GradeReason": "Daun",
                "GradeValue": "2"
            },
            {
                "studentId": 41,
                "GradeReason": "Vadym",
                "GradeValue": "5"
            }],
            studentsWithIDKey: [
                {
                    user_id: null,
                    user_name: null
                },
            ],
            Grade: [],
            GradeReasons: [],
            subject_id: 0,
            classroom_id: 6,
        }
    },
    components: {
        GradesTableChange,
        GradesModalWindow
    },
    mounted() {
        this.emitter.on("SelectLesson", (data) => {
            console.log(data.data);
            this.classroom_id = data.data.ClassroomId
            this.subject_id = data.data.SubjectId
            this.GetStudents();
            this.GetGradesDetails();
        })
    },
    methods: {
        GetStudents() {
            this.studentsWithIDKey = []
            axios
                .get(`/api/classroomUsers/${this.classroom_id}`)
                .then(response => {
                    // Create a new array using spread syntax to avoid mutating the original data
                    this.studentsWithIDKey = response.data.data.map(student => ({
                        // Use dynamic property name creation for clarity and flexibility
                        user_id: student.id,
                        user_name: student.name
                    }));
                    console.log(this.studentsWithIDKey);
                })
                .catch(error => {
                    console.error("Error fetching students:", error);
                    // Handle error gracefully, e.g., display an error message to the user
                });
        },
        GetGradesDetails() {
            const expData =this.fakeGrades;
            console.log(expData);
        }


    },

}
</script>