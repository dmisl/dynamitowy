<script setup>

    import { computed } from 'vue'

    const people = [
        {
            name: 'Vasul',
            age: 20,
            job: 'coach',
        },
        {
            name: 'Dmytro',
            age: 18,
            job: 'nobody',
        },
        {
            name: 'Petro',
            age: 15,
            job: 'debil',
        },
    ]

</script>
<template>
    <div v-for="(person, index) in people" v-key="index">
        Name: {{ person.name }}<br>
        Age: {{ person.age }}<br>
        Job: {{ person.job }}<br>
        <hr>
    </div>
</template>
