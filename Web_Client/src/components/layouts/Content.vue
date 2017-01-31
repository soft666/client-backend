<template>
  <div>
    <div class="container contents">

      <div class="row" style="margin-top: 20px;">
        <div v-for="value in House" class="col-lg-4 col-md-4 col-xs-12">
          <el-card :body-style="{ padding: '0px' }">
            <img :src="Dir + value.image" style="width: 100%;">
            <h2 style="padding-left: 10px; padding-right: 10px;">{{ value.name }} 
              <el-button type="primary" size="small" class="pull-right" @click="viewalbum_btn(value.id)"><i class="el-icon-view"></i> ดูรูปภาพ</el-button>
            </h2>
          </el-card>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <hr class="featurette-divider">

      <div class="row featurette" style="padding-left: 15px; padding-right: 15px;">
        <div class="col-xs-12">
          <h2 class="featurette-heading">กิจกรรม และ บริการต่าง ๆ </h2>
          <p class="lead">{{ EventsText }}.</p>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6" v-for="val in Events" style="padding-top: 5px; padding-left: 4px; padding-right: 4px;">
            <el-card :body-style="{ padding: '0px' }">
              <img class="featurette-image img-responsive center-block" :src="Dir + val.image" style="height: 230px; width: 100%">
              <div style="padding: 14px;">
                <span>{{ val.name }}</span>
                <div class="bottom clearfix">
                  <time class="time"></time>
                  <el-button type="primary" size="small" class="pull-right" @click="viewevent_btn(val.id)"><i class="el-icon-view"></i> ดูรูปภาพ</el-button>
                </div>
              </div>
            </el-card>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <br>
              <el-pagination layout="prev, pager, next" 
                            @current-change="handleCurrentChange"
                            :page-size ="4" 
                            :current-page="currentpageEvent"
                            :total="totalEvent">
              </el-pagination>
          </div>
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

      <div class="row" style="padding-left: 15px; padding-right: 15px;">

      <div class="col-lg-3 col-md-4 col-xs-6" v-for="val in Gallery" style="padding-left: 0px; padding-right: 0px;">
          <el-card :body-style="{ padding: '0px' }">
              <img class="img-responsive" :src="Dir + val.name" alt="" style="width:400px; height:200px;">
          </el-card>
      </div>
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="padding: 5px;">
              <el-pagination layout="prev, pager, next" 
                            @current-change="CurrentChangeGallery"
                            :page-size ="12" 
                            :current-page="currentpageEvent"
                            :total="totalGallery">
              </el-pagination>
          </div>
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
    Dir: apiImg,
    totalEvent: 0,
    currentpageEvent: 1,
    totalGallery: 0,
    currentpageGallery: 1
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
    viewevent_btn (id, name) {
      this.$router.push({path: 'viewdetailevent/' + id})
    },
    GalleryApi (val) {
      this.$http.get(apiViewGallery + '?page=' + val).then((response) => {
        this.Gallery = response.data.model.data
        this.totalGallery = response.data.model.total
      }, (response) => {
        // error callback
      })
    },
    EventApi (val) {
      this.$http.get(apiViewEvent + '?page=' + val).then((response) => {
        this.Events = response.data.model.data
        this.totalEvent = response.data.model.total
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
    },
    handleCurrentChange (val) {
      this.EventApi(val)
    },
    CurrentChangeGallery (val) {
      this.GalleryApi(val)
    }
  }
}
</script>
