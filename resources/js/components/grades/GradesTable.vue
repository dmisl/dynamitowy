<template>
    <div>
        <table class="table table-primary table-bordered">
            <tbody>
                <tr>
                    <!-- id: this.GradeReasons.length + 1,
                    name: data,
                    subject_id:this.subject_id,
                    classroom_id: this.classroom_id,
                    date: this.todaysDate(), -->
                    <th>Imie Nazwisko</th>
                    <th v-if="this.GradeReasons.length > 0" @click="selectGradeReason(index, GradeReason.id)"
                        v-for="(GradeReason, index) in this.GradeReasons" :key="index" class="text-center">{{
                            GradeReason["name"] }}</th>
                    <th class="text-center">Dodac temat oceny</th>
                </tr>
                <tr :class="{ 'table-success': student.user_id == this.selectedStudentId }"
                    v-for="(student, index) in this.studentsWithIDKey" :key="student.user_id">
                    <td :class="{ 'table-success': student.user_id == this.selectedStudentId }"
                        @click="this.selectStudent(student.user_id)">{{ student.user_name }}</td>
                    <td :class="{ 'table-info': reasonIndex == this.selectedGradeReason }"
                        @click="this.selectGradeReason(reasonIndex,)" class="text-center"
                        v-for="(gradeReason, reasonIndex) in this.GradeReasons" :key="reasonIndex">
                        {{ getGradeValue(student.user_id, gradeReason.id) }}
                    </td>
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
            </tbody>
        </table>
    </div>
    <GradesModalWindow :subject_id="this.subject_id" :classroom_id="this.classroom_id"></GradesModalWindow>
    <GradesTableChange v-if="this.selectedStudentId"
        :name="this.studentsWithIDKey.filter(student => student.user_id == this.selectedStudentId)[0].user_name">
    </GradesTableChange>
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
                studentId: 139,
                GradeReasonId: 1,
                GradeValue: "-1"
            }],
            studentsWithIDKey: [
                {
                    user_id: null,
                    user_name: null
                },
            ],
            Grade: [],
            GradeReasons: [
                {
                    id: 0,
                    name: "test",
                    subject_id: this.subject_id,
                    classroom_id: this.classroom_id,
                    date: this.todaysDate()
                }
            ],



            subject_id: null,
            classroom_id: null,
            selectedStudentId: null,
            selectedGradeReason: null,
            selectedGradeReasonId: null,
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
        })
        this.emitter.on("ChangeGrades", (data) => {
            this.changeGrade(data);
        })
        this.emitter.on("AddGradeReason", (data) => {
            const dataToSend =
                {
                    name: data,
                    subject_id: this.subject_id,
                    classroom_id: this.classroom_id,
                    date: this.todaysDate(),
                }
            axios.post('http://127.0.0.1:8000/gradereason', dataToSend).then(response => {
                console.log(response);
                console.log(response.data);
            })
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
                    this.selectStudent(this.studentsWithIDKey[0].user_id);

                })
                .catch(error => {
                    console.error("Error fetching students:", error);
                    // Handle error gracefully, e.g., display an error message to the user
                });

        },
        getGradeValue(studentId, gradeReasonId) {
            const matchingGrade = this.fakeGrades.find(grade => grade.studentId === studentId && grade.GradeReasonId === gradeReasonId);
            return matchingGrade ? matchingGrade.GradeValue : 'brak'; // Return empty string if no match found
        },
        selectStudent(x) {
            console.log(x);
            this.selectedStudentId = x
        },
        selectGradeReason(x, id) {
            console.log(x);
            this.selectedGradeReason = x
            this.selectGradeReasonId = id

        },
        changeGrade(x) {
            const G = {
                studentId: this.selectedStudentId,
                GradeReasonId: this.GradeReasons[this.selectedGradeReason].id,
                GradeValue: x.data,
            }
            const existingGradeIndex = this.fakeGrades.findIndex(
                (grade) =>
                    grade.studentId === G.studentId && grade.GradeReason === G.GradeReason
            );

            if (existingGradeIndex !== -1) {
                // If the grade already exists, update its value
                this.fakeGrades[existingGradeIndex].GradeValue = G.GradeValue;
            } else {
                // If the grade doesn't exist, push a new object
                this.fakeGrades.push(G);
            }
            this.selectedStudentId++
        },
        sendGrades() {
            console.log(this.fakeGrades);
            axios
                .post(`/api/grades`, this.fakeGrades)
                .then(response => {

                })
                .catch(error => {
                    console.error("Error fetching students:", error);
                    // Handle error gracefully, e.g., display an error message to the user
                });
        },
        todaysDate() {
            const today = new Date();

            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
            const dd = String(today.getDate()).padStart(2, '0');

            return `${yyyy}-${mm}-${dd}`;
        }

    },

}
</script>