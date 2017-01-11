<template>
  <div>
    <div class="container contents">
      <div style="margin-top: 20px;">

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          	<div class="alert alert-info">
          		<strong>อัลบั้มรูปภาพ : {{ viewAlbumName }}</strong>
          	</div>
          </div>
        </div>

        <div class="row" ref="pictures">
          <div v-for="value in viewAlbum" class="col-lg-3 col-md-4 col-xs-6 thumb">
              <a class="thumbnail" href="#">
                  <img class="img-responsive" :src="Dri + value.name" style="width: 100%; height: 185px;">
              </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import {apiViewAlbum, apiImg, apiViewAlbumName} from '../service/backend'

export default {
  data: () => ({
    viewAlbum: '',
    viewAlbumName: '',
    Dri: apiImg
  }),
  mounted () {
    this.album()
    this.albumname()
  },
  methods: {
    album () {
      this.$http.get(apiViewAlbum + this.$route.params.id).then((response) => {
        this.viewAlbum = response.data.model.data
      }, (response) => {
        // error callback
      })
    },
    albumname () {
      this.$http.get(apiViewAlbumName + this.$route.params.id).then((response) => {
        this.viewAlbumName = response.data.model.name
      }, (response) => {
        // error callback
      })
    }
  }
}
</script>

<style lang="css">
</style>
