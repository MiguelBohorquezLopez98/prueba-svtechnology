import { createRouter, createWebHistory } from 'vue-router'
import Login from '../views/Login.vue'
import HomeView from '../views/HomeView.vue'
import UsuarioNew from '../views/UsuarioNew.vue'
import UsuarioEdit from '../views/UsuarioEdit.vue'
import UsuarioView from '../views/UsuarioView.vue'
import Articulo from '../views/Articulo.vue'
import ArticuloNew from '../views/ArticuloNew.vue'
import ArticuloEdit from '../views/ArticuloEdit.vue'
import ArticuloView from '../views/ArticuloView.vue'




const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/createE',
    name: 'createE',
    component: UsuarioNew
  },
  {
    path: '/editE/:id',
    name: 'editE',
    component: UsuarioEdit
  },
  {
    path: '/viewE/:id',
    name: 'viewE',
    component: UsuarioView
  },
  {
    path: '/login',
    name: 'login',
    component: Login
  },
  {
    path: '/articulos',
    name: 'articulos',
    component: Articulo
  },
  {
    path: '/viewA/:id',
    name: 'viewA',
    component: ArticuloView
  },
  {
    path: '/editA/:id',
    name: 'editA',
    component: ArticuloEdit
  },
  {
    path: '/createA',
    name: 'createA',
    component: ArticuloNew
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
