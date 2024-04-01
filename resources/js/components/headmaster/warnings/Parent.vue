<script setup>

    import { ref, provide, markRaw } from 'vue'
    import axios from 'axios'

    import Index from './Index.vue';
    import Show from './Show.vue';
    import ShowClassroom from './ShowClassroom.vue';

    const rawIndex = markRaw(Index)
    const rawShow = markRaw(Show)
    const rawShowClassroom = markRaw(ShowClassroom)

    const currentComponent = ref(rawIndex)

    function change(component)
    {
        currentComponent.value = component
    }

    provide('imported', {rawIndex, rawShow, rawShowClassroom})
    provide('change', change)

</script>

<template>
    <div>

        <div class="d-flex">

            <div style="height: 100%;">
                <div class="col-md-3 bg-info bg-gradient" style="position: fixed; height: 100vh;">
                    <div class="user-select-none">

                        <div>

                            <div @click="change(rawPresence)" role="button" class="m-0 p-0 border-bottom border-dark">
                                <p class="p-0 m-0 ps-1 pt-1 fw-medium">Zarządzać obecnościami</p>
                            </div>
                            <div @click="change(rawGrade)" role="button" class="m-0 p-0 border-bottom border-dark">
                                <p class="p-0 m-0 ps-1 pt-1 fw-medium">Zarządzać ocenami</p>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>

            <div class="col-md-9">

                <component :is="currentComponent"></component>

            </div>

        </div>

    </div>
</template>
