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

        <div class="row" style="padding-left: 15px; padding-right: 15px;">

          <div v-for="value in viewAlbum" class="col-lg-3 col-md-4 col-xs-6" style="padding-top: 5px; padding-left: 2px; padding-right: 2px;">
              <el-card :body-style="{ padding: '0px' }">
                <img class="featurette-image img-responsive center-block" :src="Dir + value.image" style="height: 210px; width: 100%">
                <div style="padding: 14px;">
                  <span>{{ value.name }}</span>
                  <div class="bottom clearfix">
                    <time class="time"></time>
                    <el-button type="primary" size="small" class="pull-right" @click="viewalbum_btn(value.id)"><i class="el-icon-view"></i> ดูรูปภาพ</el-button>
                  </div>
                </div>
              </el-card>
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
