<script setup>

import {inject} from 'vue'

const props = defineProps(['prefix'])

const title = inject('title')
title(`Dziennik | Dynamitowy`)

</script>
<template>
    <div class="user-select-none">

        <h2 class="fw-light text-center" style="margin-top: 200px;">Wybierz sekcje</h2>

    </div>
</template>
