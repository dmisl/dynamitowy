import { createApp } from 'vue/dist/vue.esm-bundler.js';
import mitt from 'mitt';
import Login from './components/form/Login.vue';
import LessonsNavigate from './components/presence/LessonsNavigate.vue'
import PresenceTable from './components/presence/PresenceTable.vue';

const emitter = mitt()
const app = createApp({});

app.component('Login', Login);

app.component('PresenceTable', PresenceTable);
app.component('LessonsNavigate', LessonsNavigate);
app.config.globalProperties.emitter=emitter
app.mount("#app");


// app.component("AppMenuClassroom", ClassroomMenu);
// app.component("AppCreate", AppCreate);
// app.component("AppEdit", AppEdit);
// app.component("AppShow", AppShow);
// app.component("AppTimetable", AppTimetable);
// app.component("AppTimetableEdit", AppTimetableEdit);