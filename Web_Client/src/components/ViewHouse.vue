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

        <div class="row" ref="pictures" id="lightgallery">
          <div v-for="value in viewAlbum" class="col-lg-3 col-md-4 col-xs-6 thumb item" style="padding-top: 5px;">
              <el-card :body-style="{ padding: '0px' }">
                  <img class="img-responsive" :src="Dri + value.name" style="width: 100%; height: 185px;">
              </el-card>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>
<script>
import {apiViewHouse, apiImg, apiViewHouseNmae} from '../service/backend'

export default {
  data: () => ({
    viewAlbum: '',
    viewAlbumName: '',
    Dri: apiImg,
    dialogVisible: false
  }),
  mounted () {
    this.album()
    this.albumname()
  },
  methods: {
    album () {
      this.$http.get(apiViewHouse + this.$route.params.id).then((response) => {
        this.viewAlbum = response.data.model.data
      }, (response) => {
        // error callback
      })
    },
    albumname () {
      this.$http.get(apiViewHouseNmae + this.$route.params.id).then((response) => {
        this.viewAlbumName = response.data.model.name
      }, (response) => {
        // error callback
      })
    },
    lightGallerys () {
      // $('#lightgallery').lightGallery(
      //   selector: '.item'
      // )
    }
  }
}
</script>

<style lang="css">
</style>
