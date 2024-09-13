import './bootstrap';

import { createApp } from 'vue';
import App from './components/App.vue'
import Login from './components/Login.vue'

const app = createApp();

app.component('app', App)
app.component('login', Login)

app.mount('#app')