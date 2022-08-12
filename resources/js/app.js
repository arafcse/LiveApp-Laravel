require('./bootstrap');

import { createApp } from 'vue';

import chat from './components/chat.vue';
import posts from './components/posts.vue';

const app = createApp({});

app.component('chat',chat);
app.component('posts',posts);

app.mount("#app");