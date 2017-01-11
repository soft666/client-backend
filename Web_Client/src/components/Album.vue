<template>
  <div>
    <div class="container contents">
      <div style="margin-top: 20px;">

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          	<div class="alert alert-info">
          		<strong>อัลบั้มรูปภาพ</strong>
          	</div>
          </div>
        </div>

        <div class="row">

          <div v-for="value in viewAlbum" class="col-lg-3 col-md-4 col-xs-6">
              <div class="card" @click="viewalbum_btn(value.id)">
                  <div class="card-image">
                      <img class="img-responsive" :src="Dir + value.image" style="width: 100%; height: 185px;">

                  </div><!-- card image -->

                  <div class="card-content text-center">
                      <span>{{ value.name }}</span>
                  </div><!-- card content -->
              </div>
            </div>

        </div>

      </div>
    </div>
  </div>
</template>

<script>
import {apiAlbum, apiImg} from '../service/backend'

export default {
  data: () => ({
    viewAlbum: '',
    Dir: apiImg,
    albumname: ''
  }),
  mounted () {
    this.album()
  },
  methods: {
    album () {
      this.$http.get(apiAlbum).then((response) => {
        this.viewAlbum = response.data.model.data
      }, (response) => {
        // error callback
      })
    },
    viewalbum_btn (id, name) {
      this.$router.push({path: 'viewalbum/' + id})
    }
  }
}
</script>

<style lang="css">
</style>
