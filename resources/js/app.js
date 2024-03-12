import { createApp } from 'vue/dist/vue.esm-bundler.js';
import mitt from 'mitt';
import Login from './components/form/Login.vue';
import LessonsNavigate from './components/presence/LessonsNavigate.vue'
import PresenceTable from './components/presence/PresenceTable.vue';
import Index from './components/classroom/Index.vue';
import Show from './components/classroom/Show.vue';
import Edit from './components/classroom/Edit.vue';

const emitter = mitt()
const app = createApp({});

app.component('Login', Login);

app.component('PresenceTable', PresenceTable);
app.component('LessonsNavigate', LessonsNavigate);

app.component('ClassroomList', Index);
app.component('ClassroomShow', Show);
app.component('ClassroomEdit', Edit);

app.config.globalProperties.emitter = emitter
app.config.globalProperties.lessontimetable = { '0': '7:10', '1': '8:00', '2': '8:50', '3': '9:40', '4': '10:30', '5': '11:35', '6': '12:25', '7': '13:15', '8': '14:05','9': '14:55','10': '15:45', '11': '16:35' }
app.mount("#app");


// app.component("AppMenuClassroom", ClassroomMenu);
// app.component("AppCreate", AppCreate);
// app.component("AppEdit", AppEdit);
// app.component("AppShow", AppShow);
// app.component("AppTimetable", AppTimetable);
// app.component("AppTimetableEdit", AppTimetableEdit);
