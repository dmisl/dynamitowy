<script setup>

    import { markRaw, ref, defineComponent, provide } from 'vue';

    import Index from './Index.vue';
    import Show from './Show.vue';
    import Create from './Create.vue';
    import Classroom from './Classroom.vue';

    const props = defineProps(['classroom_id', 'teacher_id', 'has_class', 'user_id', 'prefix'])

    const rawIndex = markRaw(Index)
    const rawShow = markRaw(Show)
    const rawCreate = markRaw(Create)
    const rawClassroom = markRaw(Classroom)

    const currentComponent = ref(Index)
    const user_id = props.user_id ? ref(props.user_id) : ref(0)
    const warning_id = ref(0)

    function change(component, userId = 0, warningId = 0)
    {
        user_id.value = userId
        warning_id.value = warningId
        currentComponent.value = component
    }

    provide('imported', {rawIndex, rawShow, rawCreate, rawClassroom, user_id})
    provide('change', change)

    if(props.user_id == user_id.value)
    {
        change(rawCreate, user_id.value)
    }

</script>

<template>
    <div class="d-flex" style="height: 100%;">

        <div style="height: 100%;">
            <div class="col-md-3 bg-info bg-gradient" style="position: fixed; height: 100vh;">
                <div class="user-select-none">

                    <a role="button" @click="change(rawIndex)" class="text-decoration-none text-dark">
                        <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                            Lista uwag
                        </div>
                    </a>
                    <a role="button" @click="change(rawClassroom)" v-if="props.classroom_id" class="text-decoration-none text-dark">
                        <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                            Lista uwag klasy
                        </div>
                    </a>
                    <a role="button" @click="change(rawCreate, user_id)" class="text-decoration-none text-dark">
                        <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                            Dodac uwage
                        </div>
                    </a>

                </div>
            </div>
        </div>
        <div class="col-md-3"></div>


        <div class="col-md-9">

            <div class="p-3">

                <component :is="currentComponent" :classroom_id="props.classroom_id" :user_id="user_id" :warning_id="warning_id" :teacher_id="props.teacher_id" :pre="props.prefix"></component>

            </div>

        </div>
    </div>

</template>
