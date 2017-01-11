<template>
  <div>
    <div class="container contents">
      <div style="margin-top: 20px;">

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          	<div class="alert alert-info">
          		<strong>ติดต่อเรา</strong>
          	</div>
          </div>
        </div>

          <div class="row">
              <div class="col-sm-6">
                  <div class="well">
                      <h3 style="line-height:20%;"><i class="fa fa-home fa-1x" style="line-height:6%;color:#00b900"></i> ที่อยู่:</h3>
                      <p style="margin-top:6%;line-height:35%">{{ address }}</p>
                      <br />
                      <h3 style="line-height:20%;"><i class="fa fa-envelope fa-1x" style="line-height:6%;color:#00b900"></i> E-Mail :</h3>
                      <p style="margin-top:6%;line-height:35%">{{ email }}</p>
                      <br />
                      <h3 style="line-height:20%;"><i class="fa fa-phone-square fa-1x" style="line-height:6%;color:#00b900"></i> เบอร์โทร :</h3>
                      <p style="margin-top:6%;line-height:35%">{{ phone }}</p>
                      <br />
                      <h3 style="line-height:20%;"><i class="fa fa-facebook-square fa-1x" style="line-height:6%;color:#00b900"></i> Facebook :</h3>
                        <a style="margin-top:6%;line-height:35%" :href="facebook" target="_blank">Link Facebook</a>
                      </p>
                      <br />
                      <h3 style="line-height:20%;"><img src="https://static.line.naver.jp/line_regulation/files/ver2/LINE_Icon.png" style="width: 22px;"></i> Line :</h3>
                      <p style="margin-top:6%;line-height:35%">{{ line }}</p>
                  </div>
              </div>
              <div class="col-sm-6">
                      <img class="img-responsive" :src="Dir + maps" style="width: 100%; height: 483px;">
              </div>
          </div>

      </div>
    </div>
  </div>
</template>

<script>
import {apiImg, apiMaps} from '../service/backend'

export default {
  data: () => ({
    link: 'https://www.facebook.com/',
    Dir: apiImg,
    maps: '',
    address: '',
    phone: '',
    line: '',
    facebook: '',
    email: ''
  }),
  mounted () {
    this.ViewAddress()
  },
  methods: {
    ViewAddress () {
      this.$http.get(apiMaps).then((response) => {
        this.maps = response.data.model.imagemap
        this.address = response.data.model.address
        this.phone = response.data.model.phone
        this.line = response.data.model.line
        this.facebook = response.data.model.facebook
        this.email = response.data.model.email
      }, (response) => {
        // error callback
      })
    }
  }
}
</script>

<style lang="css">
</style>
