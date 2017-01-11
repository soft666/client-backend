@extends('backend.main')

@section('content')

      <div class="row" id="ServiceController">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2> Album </h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />

              {!! Form::open(['class' => 'form-horizontal form-label-left', '@submit.prevent' => 'AddNameAlbum', 'enctype' => 'multipart/form-data']) !!}
                
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >ชื่อ Album <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" v-model="name" name="name" class="form-control col-md-7 col-xs-12" multiple>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >รูปปก Album <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="albumimage" name="albumimage" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <!--
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >รูปภาพ <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="image_file" name="image_file[]" class="form-control col-md-7 col-xs-12" multiple>
                  </div>
                </div> -->

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
                              <p><a :href="'manager.albumview'+vdatas.id" class="btn btn-primary" role="button">เพิ่มรูป</a> <a href="#" class="btn btn-default" @click="RemoveAlbum(vdatas.id)">ลบอัลบั้ม</a></p>
                            </div>
                          </div>
                        </div>

                        
                      </div>
                      
                    </div>
               </div>

          </div>
        </div>

      </div>


<script src="js/album.js"></script>
@endsection







