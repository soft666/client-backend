@extends('backend.main')

@section('content')

      <div class="row" id="ServiceController">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2> Album : {!! $model->name !!} </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li>
                <a href="{!! URL::route('getAlbum') !!}" class="collapse-link">กลับหน้าหลัก <i class="glyphicon glyphicon-share-alt"></i></a>
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
                    <input type="text" value="{!! $model->id !!}" id="albumid" hidden>
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


<script src="js/scriptalbumview.js"></script>
@endsection







