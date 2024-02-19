import { createApp } from 'vue/dist/vue.esm-bundler.js';
import ComponentA from './components/ComponentA.vue';

const app = createApp({});

app.component('ComponentA', ComponentA);

app.mount("#app");
