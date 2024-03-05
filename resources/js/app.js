import { createApp } from 'vue/dist/vue.esm-bundler.js';
import Login from './components/form/Login.vue';

const app = createApp({});

// app.component('ComponentA', ComponentA);
app.component('Login', Login);
app.component("AppMenuClassroom", ClassroomMenu);
app.component("AppCreate", AppCreate);
app.component("AppEdit", AppEdit);
app.component("AppShow", AppShow);
app.component("AppTimetable", AppTimetable);
app.component("AppTimetableEdit", AppTimetableEdit);

app.mount("#app");
