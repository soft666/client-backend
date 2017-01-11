<template>
  <div id="app">
    <nav-tap></nav-tap>
    <slide></slide>
    <router-view></router-view>
    <br>
    <footers></footers>
  </div>
</template>

<script>
import NavTap from './components/layouts/NavTap'
import Slide from './components/layouts/Slide'
import Footers from './components/layouts/Footer'

export default {
  name: 'app',
  components: {
    NavTap,
    Slide,
    Footers
  }
}
</script>
