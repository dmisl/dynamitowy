import { createApp } from 'vue/dist/vue.esm-bundler.js';

import JournalParent from './components/journal/Parent.vue'

const app = createApp({});

app.component('Login', Login);

app.component('JournalParent', JournalParent)

app.mount("#app");


