<template>
    <div>
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="./" method="POST">
                        <div class="modal-body">
                            <label for="text">Podaj opis</label>
                            <input id="text" class="form-control" v-model="text" type="text" name="text">
                            <input type="hidden" name="subject_id" :value="subject_id">
                            <input type="hidden" name="classroom_id" :value="classroom_id">
                            <input type="hidden" name="date" :value="date">
                        </div>
                        <div class="modal-footer">
                            <button type="button"  data-bs-dismiss="modal" class="btn btn-secondary">Zamknac</button>
                            <button type="submit"  data-bs-dismiss="modal" @click.prevent="addGradeReason()" class="btn btn-primary">Dodac temat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "GradesModalWindow",
    data() {
        return {
            date:new Date().toISOString(),
            text: '',
        }
    },
    props: {
        subject_id: Number,
        classroom_id: Number,
    },
    methods: {
        addGradeReason() {
            
        }
    },
}
</script>