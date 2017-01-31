<template>
  <div>
    <div class="container contents">
      <div class="row" style="margin-top: 20px;">
        <!-- --------------------------------------------- -->

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        	<div class="alert alert-info">
        		<strong>ราคาห้องพัก</strong>
        	</div>

          <table class="table table-bordered table-hover">
    				<thead>
    					<tr>
    						<th class="text-center">ประเภท</th>
    						<th class="text-center">จำนวนคน</th>
    						<th class="text-center">ค่าเช่ารายวัน</th>
    					</tr>
    				</thead>
    				<tbody>
    					<tr v-for="value in viewPrice">
    						<td class="text-center">{{ value.typename }}</td>
    						<td class="text-center">{{ value.count }}</td>
    						<td class="text-center">{{ value.price }}</td>
    					</tr>
    				</tbody>
    			</table>

          </div>

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="alert alert-info">
                  <strong>สิ่งอำนวยความสะดวก </strong>
                </div>

                <table class="table table-bordered table-hover">
          				<tbody>
                    <tr v-for="value in viewServices">
          						<td class="text-center">{{ value.name }}</td>
          					</tr>
          				</tbody>
          			</table>

              </div>

        <!-- ------------------------------------------------------ -->
      </div><!-- /.row -->
    </div>
  </div>
</template>

<script>
import {apiPrice, apiServices} from '../service/backend'

export default {
  data: () => ({
    viewPrice: '',
    viewServices: ''
  }),
  mounted () {
    this.price()
    this.service()
  },
  methods: {
    price () {
      this.$http.get(apiPrice).then((response) => {
        this.viewPrice = response.data.model.data
      }, (response) => {
        // error callback
      })
    },
    service () {
      this.$http.get(apiServices).then((response) => {
        this.viewServices = response.data.model.data
      }, (response) => {
        // error callback
      })
    }
  }
}
</script>

<style lang="css">
</style>
