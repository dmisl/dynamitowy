<script setup>

import {ref} from 'vue'
import axios from 'axios'

const someData = [
    { id: 2, employee_id: 1,},
    { id: 3, employee_id: 2,},
    { id: 4, employee_id: 3,},
]

console.log(someData)

function getMessage()
{
    axios.post('/test_message', {someData})
    .then(response => {
        console.log(response)
    })
}

getMessage()

</script>
<template>
    <div>
        
    </div>
</template>