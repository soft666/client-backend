<template>
  <div>
    <div ref="carousel" class="owl-carousel" style="z-index: -1">
      <div class="item"><img :src="name[0]"></div>
      <div class="item"><img :src="name[1]"></div>
      <div class="item"><img :src="name[2]"></div>
      <div class="item"><img :src="name[3]"></div>
      <div class="item"><img :src="name[4]"></div>
      </div>
  </div>
</template>

<script>
import {apiSlide, apiImg} from '../../service/backend'

export default {
  data: () => ({
    name: [],
    url: ''
  }),
  mounted () {
    this.getSlide()
    this.carousel()
  },
  methods: {
    getSlide () {
      this.url = apiImg
      this.$http.get(apiSlide).then((response) => {
        this.name = response.data.model
        for (var item in response.data.model) {
          this.name[item] = this.url + response.data.model[item].name
        }
      }, (response) => {
        // error callback
      })
    },
    carousel () {
      $(this.$refs.carousel).owlCarousel({
        animateOut: 'fadeOut',
        items: 1,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        autoHeight: false,
        mouseDrag: false,
        touchDrag: false
      })
    }
  }
}
</script>

<style media="screen">
  .owl-carousel .item img {
    display: block;
    height: 450px;
  }
</style>
