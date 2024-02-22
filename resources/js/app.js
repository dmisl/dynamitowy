import { createApp } from 'vue/dist/vue.esm-bundler.js';
import Login from './components/form/Login.vue';

const app = createApp({});

// app.component('ComponentA', ComponentA);
app.component('Login', Login);

app.mount("#app");
