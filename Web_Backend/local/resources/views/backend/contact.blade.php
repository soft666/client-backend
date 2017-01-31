@extends('backend.main')

@section('content')

      <div class="row" id="ContactController">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>แผนที่/ติดต่อเรา </h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />

              {!! Form::open(['class' => 'form-horizontal form-label-left', '@submit.prevent' => 'AddContact']) !!}
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >ที่อยู่ <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input v-model="newContact.address" type="text" id="address" name="address" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">  Email <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input v-model="newContact.email" type="email" id="email" name="email" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">เบอร์โทร <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input v-model="newContact.phone" type="text" id="phone" name="phone" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Facebook <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input v-model="newContact.facebook" type="text" id="facebook" name="facebook" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Line <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input v-model="newContact.line" type="text" id="line" name="line" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >แผนที่ <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="contactmap" name="contactmap" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                  </div>
                </div>

                <div class="ln_solid"></div>

              {!! Form::close() !!}
            </div>



          </div>
        </div>

      </div>

<script>

new Vue({
    http: {
        headers: {
            'X-CSRF-TOKEN' : document.querySelector('#token').getAttribute('value')
        }
    },
    el: '#ContactController',
    data: { newContact: {
                address: '',
                email: '',
                phone: '',
                facebook: '',
                line: '',
        }
    },
    mounted: function() {
        this.FromData();
    },
    methods: {
      AddContact: function () {
        var formData = new FormData();
        formData.append('address', this.newContact.address);
        formData.append('email', this.newContact.email);
        formData.append('phone', this.newContact.phone);
        formData.append('line', this.newContact.line);
        formData.append('facebook', this.newContact.facebook);
        formData.append('image', $('#contactmap')[0].files[0]);
        this.$http.post('manager/contact/post', formData).then((response) => {
          this.Notify('Success','เพิ่มรายการแล้ว','success');
        }, (response) => {
            // error callback
        });
      },
      FromData: function () {
        this.$http.get('manager/contact/fromdata')
            .then(function (res) {
              this.newContact.address = res.data.address
              this.newContact.email = res.data.email
              this.newContact.phone = res.data.phone
              this.newContact.line = res.data.line
              this.newContact.facebook = res.data.facebook
        });
      },
      Notify: function(title,text,type) {
          new PNotify({
              title: title,
              text: text,
              type: type,
              styling: 'bootstrap3'
          });
      }
    }
});

</script>
@endsection
