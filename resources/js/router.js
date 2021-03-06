import Vue from 'vue'
import VueRouter from 'vue-router'

import PhotoList from './pages/Photolist.vue'
import Login from './pages/Login.vue'

import store from './store'

/* RouterViewを使うため */
Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: PhotoList
  },
  {
    path: '/login',
    component: Login,
    beforeEnter (to, from, next) {
      if (store.getters['auth/check']) {
        next('/')
      } else {
        next()
      }
    }
  }
];

const router = new VueRouter({
  mode: 'history',
  routes
});

/* app.jsでインポートするため */
export default router
