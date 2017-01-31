// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
// import VueRouter from 'vue-router'
import App from './App'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'

Vue.use(VueRouter)
Vue.use(VueResource)
Vue.use(ElementUI, { locale })

import router from './router'

import '!script!jquery/dist/jquery.min.js'
import '!style!css!bootstrap/dist/css/bootstrap.min.css'
import '!script!bootstrap/dist/js/bootstrap.min.js'
import '!script!owl.carousel/dist/owl.carousel.min.js'
import '!style!css!owl.carousel/dist/assets/owl.carousel.min.css'
import '!style!css!bootstrap/dist/css/bootstrap-theme.css'
import '!script!viewerjs/dist/viewer.min.js'
import '!style!css!viewerjs/dist/viewer.min.css'
import '!style!css!./assets/css/main.css'

/* eslint-disable no-new */
new Vue({
  el: '#app',
  template: '<App/>',
  router,
  components: { App }
})
