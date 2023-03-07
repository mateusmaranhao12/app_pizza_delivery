import { createRouter, createWebHistory } from 'vue-router'
import AdicionarPedido from '../views/AdicionarPedido.vue'
import Cadastro from '../views/Cadastro.vue'
import Home from '../views/Home.vue'
import ListaPedidos from '../views/ListaPedidos.vue'
import Index from '../views/Index.vue'

const routes = [
  {
    path: '/',
    name: 'Index',
    component: Index
  },

  {
    path: '/home',
    name: 'Home',
    component: Home
  },

  {
    path: '/adicionar-pedido',
    name: 'AdicionarPedido',
    component: AdicionarPedido
  },

  {
    path: '/lista-pedidos',
    name: 'ListaPedidos',
    component: ListaPedidos
  },

  {
    path: '/cadastro',
    name: 'Cadastro',
    component: Cadastro
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
