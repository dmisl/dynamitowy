import { createApp } from 'vue/dist/vue.esm-bundler.js';
import mitt from 'mitt';
import Login from './components/form/Login.vue';
import LessonsNavigate from './components/presence/LessonsNavigate.vue'
impo

const emmiter = mitt()
const app = createApp({});

// app.component('ComponentA', ComponentA);
app.component('Login', Login);
app.component('LessonsNavigate', LessonsNavigate);
app.config.globalProperties.emmiter=emmiter
app.mount("#app");
