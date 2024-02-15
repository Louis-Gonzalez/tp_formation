import { createApp } from "vue";
import {createPinia} from "pinia"
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
//import { create } from "core-js/core/object";

const app = createApp(App);
app.use(createPinia());
app.use(router).mount("#app");
