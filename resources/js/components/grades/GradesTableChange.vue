<template>
    <div class="d-inline-block bg-warning rounded-3" style="position: fixed; bottom: 20px; right: 20px;">
        <div class="p-2">
            <h4 class="fw-medium">{{ "Wybierz ucznia" }}</h4>
            <table class="table table-primary bordered border-dark">
                <tr>
                    <td colspan="3" class="p-1 text-center border-end border-dark fs-5">Oceny</td>
                </tr>
                <tr>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">6</p>
                    </td>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">-6</p>
                    </td>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">5</p>
                    </td>
                </tr>
                <tr>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">5+</p>
                    </td>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">5-</p>
                    </td>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">4</p>
                    </td>
                </tr>
                <tr>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">4+</p>
                    </td>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">4-</p>
                    </td>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">3</p>
                    </td>
                </tr>
                <tr>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">3+</p>
                    </td>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">3-</p>
                    </td>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">2</p>
                    </td>
                </tr>
                <tr>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">2+</p>
                    </td>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">2-</p>
                    </td>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">1</p>
                    </td>
                </tr>
                <tr>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">1+</p>
                    </td>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">np</p>
                    </td>
                    <td    class="p-1 border-end border-dark">
                        <p class="p-0 m-0">brak</p>
                    </td>
                </tr>
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
    methods: {
        changegrades() {
            console.log();
            this.emitter.emit("ChangeGrades", { data: this.grade });
        }
    },
}
</script>