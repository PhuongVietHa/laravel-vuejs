require('@/bootstrap');

import { createApp } from 'vue'
import App from './App.vue';
import router from './router';
import store from './store';
import mixin from '@/helper_function';

const app = createApp(App)
app.mixin(mixin)
app.use(router)
app.use(store)
app.mount('#app')
