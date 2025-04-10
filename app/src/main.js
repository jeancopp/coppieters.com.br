import "bootstrap/dist/css/bootstrap.css";
import "font-awesome/css/font-awesome.min.css";
import './styles/variables.css'
import './styles/style.css'

import { createApp } from 'vue'
import { createPinia } from "pinia";
import App from './App.vue'
import router from "./config/router.js";

createApp(App)
  .use(router)
  .use(createPinia())
  .mount('#app')


import "bootstrap/dist/js/bootstrap.js";
