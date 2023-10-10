import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import { createPinia } from 'pinia';

// bootstrap
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.js';

//css
import './assets/css/style.css';

const app = createApp(App);

app.use(createPinia());
app.use(router);

app.mount('#app');
