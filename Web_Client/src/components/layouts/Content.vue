<template>
  <div>
    <div class="container contents">

      <div class="row" style="margin-top: 20px;">
        <div v-for="value in House" class="col-lg-4 col-md-4 col-xs-12">
          <img :src="Dir + value.image" style="width: 100%;">
          <h2>{{ value.name }} <a class="btn btn-info btn-sm pull-right" @click="viewalbum_btn(value.id)" role="button">ดูรูปภาพ</a></h2>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-xs-12">
          <h2 class="featurette-heading">กิจกรรม และ บริการต่าง ๆ </h2>
          <p class="lead">{{ EventsText }}.</p>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6" v-for="val in Events">
          <a class="thumbnail" href="#">
            <img class="featurette-image img-responsive center-block" :src="Dir + val.name" style="height: 210px;">
          </a>
        </div>
      </div>

      <hr style="margin: 10px 0;">

      <div class="row">
        <div class="col-md-12">
          <blockquote>
            <h3>Thumbnail Gallery</h3>
          </blockquote>
        </div>
      </div>

      <div class="row">

    <div class="col-lg-3 col-md-4 col-xs-6" v-for="val in Gallery">
        <a class="thumbnail" href="#">
            <img class="img-responsive" :src="Dir + val.name" alt="" style="width:400px; height:200px;">
        </a>
    </div>
</div>


    </div>


  </div>
</template>

<script>
import {apiImg, apiHouse, apiViewGallery, apiViewEvent, apiViewEventText} from '../../service/backend'

export default {
  data: () => ({
    House: [],
    Gallery: [],
    Events: [],
    EventsText: '',
    Dir: apiImg
  }),
  mounted () {
    this.HouseApi()
    this.GalleryApi()
    this.EventApi()
    this.EventTextApi()
  },
  methods: {
    HouseApi () {
      this.$http.get(apiHouse).then((response) => {
        this.House = response.data.model.data
      }, (response) => {
        // error callback
      })
    },
    viewalbum_btn (id, name) {
      this.$router.push({path: 'viewhouse/' + id})
    },
    GalleryApi () {
      this.$http.get(apiViewGallery).then((response) => {
        this.Gallery = response.data.model.data
      }, (response) => {
        // error callback
      })
    },
    EventApi () {
      this.$http.get(apiViewEvent).then((response) => {
        this.Events = response.data.model.data
      }, (response) => {
        // error callback
      })
    },
    EventTextApi () {
      this.$http.get(apiViewEventText).then((response) => {
        this.EventsText = response.data.model.data[0].text
      }, (response) => {
        // error callback
      })
    }
  }
}
</script>
