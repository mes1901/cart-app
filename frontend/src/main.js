import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import store from './store'
import BootstrapVue from 'bootstrap-vue'
import Notifications from 'vue-notification'
import ProductsPage from './components/ProductsPage'
import SuccessPage from './components/SuccessPage'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.config.productionTip = false

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(Notifications);

const router = new VueRouter({
  mode: 'history',
  base: '/',
  routes: [
    {
      path: '/',
      component: ProductsPage,
      name: 'ProductsPage'
    },
    {
      path: '/order/:id',
      component: SuccessPage,
      name: 'SuccessPage'
    }
  ]
})

new Vue({
  render: h => h(App),
  router,
  store,
}).$mount('#app')
