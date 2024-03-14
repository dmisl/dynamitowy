import { createApp } from 'vue/dist/vue.esm-bundler.js';
import mitt from 'mitt';
import Login from './components/form/Login.vue';
import LessonsNavigate from './components/presence/LessonsNavigate.vue'
import PresenceTable from './components/presence/PresenceTable.vue';
import GradesNavMenu from './components/grades/GradesNavMenu.vue';
import GradesTable from './components/grades/GradesTable.vue';

import Index from './components/classroom/Index.vue';
import Show from './components/classroom/Show.vue';
import Edit from './components/classroom/Edit.vue';
import Create from './components/classroom/Create.vue';
import Timetable from './components/classroom/Timetable.vue';
import TimetableEdit from './components/classroom/TimetableEdit.vue';
import Parent from './components/classroom/Parent.vue';

import WarningParent from './components/warning/Parent.vue';
import WarningIndex from './components/warning/Index.vue';
import WarningShow from './components/warning/Show.vue';
import WarningCreate from './components/warning/Create.vue';
import WarningClassroom from './components/warning/Classroom.vue';

const emitter = mitt()
const app = createApp({});

app.config.globalProperties.emitter = emitter
app.config.globalProperties.lessontimetable = { '0': '7:10', '1': '8:00', '2': '8:50', '3': '9:40', '4': '10:30', '5': '11:35', '6': '12:25', '7': '13:15', '8': '14:05','9': '14:55','10': '15:45', '11': '16:35' }


app.component('Login', Login);

app.component('PresenceTable', PresenceTable);
app.component('LessonsNavigate', LessonsNavigate);

app.component('GradesNavMenu', GradesNavMenu);
app.component('GradesTable', GradesTable);

app.component('ClassroomList', Index);
app.component('ClassroomShow', Show);
app.component('ClassroomEdit', Edit);
app.component('ClassroomCreate', Create);
app.component('ClassroomTimetable', Timetable);
app.component('ClassroomTimetableEdit', TimetableEdit);
app.component('ClassroomParent', Parent);

app.component('WarningParent', WarningParent)
app.component('WarningIndex', WarningIndex)
app.component('WarningShow', WarningShow)
app.component('WarningCreate', WarningCreate)
app.component('WarningClassroom', WarningClassroom)

app.mount("#app");


