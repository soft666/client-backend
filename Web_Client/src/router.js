import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from './components/Home'
import PriceService from './components/PriceService'
import Album from './components/Album'
import ViewAlbum from './components/ViewAlbum'
import Contact from './components/Contact'
import ViewHouse from './components/ViewHouse'
import ViewEvent from './components/ViewEvent.vue'

const router = new VueRouter({
  mode: 'history',
  routes: [
  { path: '/', component: Home },
  { path: '/price', component: PriceService },
  { path: '/album', component: Album },
  { path: '/viewalbum/:id', component: ViewAlbum },
  { path: '/contact', component: Contact },
  { path: '/viewhouse/:id', component: ViewHouse },
  { path: '/viewdetailevent/:id', component: ViewEvent },
  { path: '*', redirect: '/' }
  ]
})

export default router
