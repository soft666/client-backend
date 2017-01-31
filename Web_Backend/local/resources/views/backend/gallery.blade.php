@extends('backend.main')

@section('content')

      <div class="row" id="ServiceController">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2> Gallery :  </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>
                <a href="{!! URL::route('getHouse') !!}" class="collapse-link">กลับหน้าหลัก <i class="glyphicon glyphicon-share-alt"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />

              {!! Form::open(['class' => 'form-horizontal form-label-left', '@submit.prevent' => 'AddImageAlbum', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >รูปภาพ <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="image_file" name="image_file[]" class="form-control col-md-7 col-xs-12" multiple>
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

                        <div v-for="vdatas in vdata" class="col-md-3 col-sm-4 col-xs-6" style="margin-top: 10px;">
                            <img :src="'images/'+vdatas.name" @click="RemoveImage(vdatas.id)" style="width: 105%; height:163px;">
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

    el: '#ServiceController',
    data: { name: '',
            albumimage: '',
            vdata: [],
            id: '',
            albumid: '',
    },
    mounted: function() {
        this.fetchViewData();
    },
    methods: {
        fetchViewData: function() {
              this.$http.get('manager/gallery/viewdata')
                  .then(function (response) {
                  this.$set(this.$data,'vdata', response.data.model.data);
              });
        },
        AddImageAlbum: function() {
            // User input
            var formData = new FormData();
            var input = document.getElementById('image_file');
            for(var key in input.files) {
                formData.append('image['+key+']', $('#image_file')[0].files[key]);
            }
            this.$http.post('manager/gallery/post', formData).then((resoponse) => {
                this.Notify('Success','เพิ่มรูปภาพสำเร็จ','success');
                this.fetchViewData();
            }, (response) => {
                this.Notify('Error','กรุณากรอกข้อมูลให้ถูกต้อง','error');
            });
        },
        RemoveImage: function(id) {
            var ConfirmBox = confirm("ต้องการลบหรือไม่")
            if(ConfirmBox) this.$http.post('manager/gallery/remove', {id : id}) .then((response) => {
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

    },

});



</script>
@endsection
