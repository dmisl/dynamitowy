<template>
    <div class="col-md-3 bg-info bg-gradient">
        <div class="user-select-none d-flex flex-column">
            <p class="p-0 m-0 fs-4 text-center border-bottom border-dark">Funkcje</p>
            <a @click="$emit('ChangeComponent', routing[0])" class="p-0 m-0 text-decoration-none text-dark">
                <p class="p-0 m-0 fs-6 border-bottom d-inline border-dark">Zarzadzanie uczniami</p>
            </a>
            <a @click="$emit('ChangeComponent', routing[1])" class="p-0 m-0 text-decoration-none text-dark">
                <p class="p-0 m-0 fs-6 border-bottom d-inline border-dark">Obecnosci</p>
            </a>
            <a @click="$emit('ChangeComponent', routing[2])" class="p-0 m-0 text-decoration-none text-dark">
                <p class="p-0 m-0 fs-6 border-bottom d-inline border-dark">Plan lekcji</p>
            </a>
            <a @click="$emit('ChangeComponent', routing[3])" class="p-0 m-0 text-decoration-none text-dark">
                <p class="p-0 m-0 fs-6 border-bottom d-inline border-dark">Edytowac plan lekcji</p>
            </a>
        </div>
    </div>
</template>
<script>
export default {
    name: "AppClassroomMenu",
    data() {
        return {
            routing: [
            "zarządaj uczniami",
            "Obecnosci",
            "Plan lekcji",
            "Edytowac plan lekcji"
            ]
        }
    },

}
</script>
