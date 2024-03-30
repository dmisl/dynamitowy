import { createApp } from 'vue/dist/vue.esm-bundler.js';

import JournalParent from './components/journal/Parent.vue'
import ProfileParent from './components/profile/Parent.vue'

const app = createApp({});

app
    .component('JournalParent', JournalParent)
    .component('ProfileParent', ProfileParent)

app.mount("#app");
