<template>
  <div>
    <div class="footer">
      <div class="container">
        <p style="font-size: 20px;">มนต์รักบ้านสวน รีสอร์ท (Offictial Website)</p>
        <p>ที่ตั้ง: {{ addresss }}</p>
        <p>เบอร์โทร: {{ phone }} E-Mail: {{ email }} Line: {{ line }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import {apiMaps} from '../../service/backend'

export default {
  data: () => ({
    name: '',
    addresss: '',
    phone: '',
    line: '',
    facebook: '',
    email: ''
  }),
  mounted () {
    this.ViewAddressFooter()
  },
  methods: {
    ViewAddressFooter () {
      this.$http.get(apiMaps).then((response) => {
        this.addresss = response.data.model.address
        this.phone = response.data.model.phone
        this.line = response.data.model.line
        this.email = response.data.model.email
        this.line = response.data.model.line
      }, (response) => {
          // error callback
      })
    }
  }
}
</script>
