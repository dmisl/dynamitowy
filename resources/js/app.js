import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

import JournalParent from './components/journal/Parent.vue'
import ProfileParent from './components/profile/Parent.vue'
import HeadmasterParent from './components/headmaster/Parent.vue'
import ChatParent from './components/chat/Parent.vue'

const app = createApp({});

app
    .component('JournalParent', JournalParent)
    .component('ProfileParent', ProfileParent)
    .component('HeadmasterParent', HeadmasterParent)
    .component('ChatParent', ChatParent)

app.mount("#app");
