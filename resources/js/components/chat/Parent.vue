<script setup>

    import { ref, onMounted, markRaw, provide } from 'vue'
    import axios from 'axios'
    import Index from './Index.vue';
    import Show from './Show.vue';

    const props = defineProps(['prefix', 'auth'])

    const loading = ref(true)

    const rawIndex = markRaw(Index)
    const rawShow = markRaw(Show)

    const currentComponent = ref(rawIndex)

    const users = ref([])

    onMounted(async () => {
        try {
            const usersResponse = await axios.get(`${props.prefix}api/users`)
            users.value = usersResponse.data.data
        } catch (error) {

        } finally
        {
            loading.value = false
        }
    })

    const user_id = ref(0)

    function change(component, userId)
    {
        currentComponent.value = component
        user_id.value = userId
    }

    provide('imported', {user_id})

</script>
<template>
    <div>
        <div class="w-100 mt-3 overflow-hidden p-0" style="height: 400px;">

            <div class="row text-start h-100 p-0 w-100">

                <div class="col-md-4 bg-secondary-subtle p-0 h-100 overflow-auto">

                    <div v-if="loading" class="p-2 ps-3">
                        Loading...
                    </div>
                    <div v-else>
                        <div v-for="user in users" @click="change(rawShow, user.id)" role="button"  class="fs-5 p-2 ps-4 border-bottom border-dark">
                            <p class="m-0 p-0">{{ user.name }}</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 p-0 h-100 overflow-hidden" style="background-color: rgb(206, 206, 206);">

                    <component :is="currentComponent" :pre="props.prefix" :auth_id="props.auth"></component>

                </div>

            </div>

        </div>
    </div>
</template>
