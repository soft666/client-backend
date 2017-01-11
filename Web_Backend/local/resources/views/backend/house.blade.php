@extends('backend.main')

@section('content')

      <div class="row" id="HouseController">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2> รูปภาพบ้านพัก </h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />

              {!! Form::open(['class' => 'form-horizontal form-label-left', '@submit.prevent' => 'AddNameHouse', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >ชื่อ บ้านพัก <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" v-model="name" name="name" class="form-control col-md-7 col-xs-12" multiple>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >รูปปก บ้านพัก <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="image" name="albumimage" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
                  </div>
                </div>

                <div class="ln_solid"></div>

              {!! Form::close() !!}
            </div>
               <div class="x_content">
                    <div class="table-responsive">
                      <div class="row">
                        <div v-for="vdatas in vdata" class="col-sm-4 col-md-4">
                          <div class="thumbnail" style="height:280px;">
                            <img :src="'images/'+vdatas.image" style="width: 100%; height:163px;">
                            <div class="caption">
                              <h3>@{{ vdatas.name }}</h3>
                              <p><a :href="'manager.houseview'+vdatas.id" class="btn btn-primary btn-sm" role="button">เพิ่มรูป</a>
                                    <a href="#" class="btn btn-default btn-sm" @click.prevent="RemoveHouse(vdatas.id)">ลบอัลบั้ม</a></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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
    el: '#HouseController',
    data: { name: '',
            albumimage: '',
            vdata: [],
            success: false,
            isErrorimage: false,
            albumid:'',
    },
    mounted: function() {
        this.fetchViewData();
    },
    methods: {
        fetchViewData: function() {
            this.$http.get('manager/house/viewdata')
                .then(function (response) {
                this.$set(this.$data,'vdata', response.data.model.data);
            });
        },
        AddNameHouse: function() {
          var formData = new FormData();
          formData.append('name', this.name);
          formData.append('image', $('#image')[0].files[0]);

          this.$http.post('manager/house/post', formData).then((response) => {
            this.Notify('Success','เพิ่มข้อมูลสำเร็จ','success');
            this.fetchViewData();
          }, (response) => {
              this.Notify('Error','กรุณากรอกข้อมูลให้ถูกต้อง','error');
          });

        },
        RemoveHouse: function(id) {
          var ConfirmBox = confirm("ต้องการลบหรือไม่")
          if(ConfirmBox) this.$http.post('manager/house/remove', {id : id}) .then((response) => {
                this.fetchViewData();
                this.Notify('Success','ลบรายการที่เลือกแล้ว','success');
           }, (response) => {
                // error callback
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

<style>
.backto a{color:#FFF; text-decoration:none}
.thumbnail{padding:0; border-radius:0; border:none; box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12)}
.thumbnail>img{width:100%; display:block}
.thumbnail h3,.card-description{margin:0; padding:8px 0; border-bottom:solid 1px #eee; text-align:justify}
.thumbnail p{padding-top:8px; font-size:20px}
</style>
@endsection
