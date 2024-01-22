import './assets/main.css' // j'appelle mon main css

import { createApp } from 'vue' // j'appelle la fonction createApp defaut createApp depuis vueJS
import App from './App.vue' // j'appelle la class App depuis vueJS 

createApp(App).mount('#app') // appel de ma fonction createApp avec son paramètre App et je lui dis de mettre le composant à l'ID #app


