import { createApp } from 'vue/dist/vue.esm-bundler.js';
import mitt from 'mitt';
import Login from './components/form/Login.vue';
import LessonsNavigate from './components/presence/LessonsNavigate.vue'
import PresenceTable from './components/presence/PresenceTable.vue';
import GradesNavMenu from './components/grades/GradesNavMenu.vue';
import GradesTable from './components/grades/GradesTable.vue';

import Parent from './components/classroom/Parent.vue';

import WarningParent from './components/warning/Parent.vue';

import LessonParent from './components/lesson/Parent.vue'

import JournalParent from './components/journal/Parent.vue'

const emitter = mitt()
const app = createApp({});

app.config.globalProperties.emitter = emitter
app.config.globalProperties.lessontimetable = { '0': '7:10', '1': '8:00', '2': '8:50', '3': '9:40', '4': '10:30', '5': '11:35', '6': '12:25', '7': '13:15', '8': '14:05','9': '14:55','10': '15:45', '11': '16:35' }


app.component('Login', Login);

app.component('PresenceTable', PresenceTable);
app.component('LessonsNavigate', LessonsNavigate);

app.component('GradesNavMenu', GradesNavMenu);
app.component('GradesTable', GradesTable);

app.component('ClassroomParent', Parent);

app.component('WarningParent', WarningParent)

app.component('LessonParent', LessonParent)

app.component('JournalParent', JournalParent)

app.mount("#app");


