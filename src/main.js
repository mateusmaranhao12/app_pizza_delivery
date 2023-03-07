import { createApp } from 'vue'
import App from './App.vue'
import Maska from 'maska'
import router from './router'


const Vue = createApp(App)

Vue.use(Maska) //plugin
Vue.use(router) //adicionando as configurações de rotas a instância do Vue
Vue.mount('#app')
