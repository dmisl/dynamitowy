<template>
    <div class="d-flex">
        <div style="height: 100%;">
            <div class="col-md-3 bg-info bg-gradient" style="position: fixed; height: 100vh;">
                <div class="user-select-none">

                    <a role="button" @click="change(rawIndex)" class="text-decoration-none text-dark">
                        <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                            Zarzadzanie uczniami
                        </div>
                    </a>
                    <a role="button" @click="change(rawTimetable)" class="text-decoration-none text-dark">
                        <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                            Plan lekcji
                        </div>
                    </a>
                    <a role="button" @click="change(rawTimetableEdit)" class="text-decoration-none text-dark">
                        <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                            Edytowac plan lekcji
                        </div>
                    </a>

                </div>
            </div>
        </div>
        <div class="col-md-3"></div>

        <div class="col-md-9">
            <component :is="currentComponent" :classroom_id="props.classroom_id" :user_id="user_id" :pre="props.prefix"></component>
        </div>
    </div>
</template>

<script setup>

    import { markRaw, ref, provide, inject } from 'vue';

    import Index from './Index.vue';
    import Show from './Show.vue';
    import Create from './Create.vue';
    import Edit from './Edit.vue';
    import Timetable from './Timetable.vue';
    import TimetableEdit from './TimetableEdit.vue';

    const props = defineProps(['classroom_id', 'prefix'])

    const rawIndex = markRaw(Index)
    const rawShow = markRaw(Show)
    const rawCreate = markRaw(Create)
    const rawEdit = markRaw(Edit)
    const rawTimetable = markRaw(Timetable)
    const rawTimetableEdit = markRaw(TimetableEdit)

    const currentComponent = ref(Index)
    const user_id = ref(0)

    function change(component, userId = 0)
    {
        user_id.value = userId
        currentComponent.value = component
    }

    const importedParent = inject('importedParent')
    const changeParent = inject('changeParent')

    provide('imported', {rawIndex, rawShow, rawCreate, rawEdit, rawTimetable, rawTimetableEdit, props})
    provide('change', change)
    provide('importedParent', importedParent)
    provide('changeParent', changeParent)

</script>
