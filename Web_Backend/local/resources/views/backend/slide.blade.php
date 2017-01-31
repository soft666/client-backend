@extends('backend.main')

@section('content')

      <div class="row" id="ServiceController">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>สิ่งอำนวยความสะดวก </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />

              {!! Form::open(['class' => 'form-horizontal form-label-left', '@submit.prevent' => 'AddNewSlide', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group" v-bind:class="{ 'has-error': isErrorimage}">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >ประเภท <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="image_file" name="pic" class="form-control col-md-7 col-xs-12">
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

                    <div class="alert alert-success" v-if="success"><span v-text="msg"></span></div>

                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">รูปภาพ  </th>
                            <th class="column-title text-center"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>

                          <tr v-for="vdatas in vdata">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=""> <img :src="'images/'+vdatas.name" style="width: 150px; height:100px;"></td>
                            <td class="text-center">
                              <button class="btn btn-danger btn-xs" @click="RemoveSlide(vdatas.id)">Remove</button>
                            </td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>

          </div>
        </div>

      </div>


<script src="js/scriptSlide.js"></script>
@endsection
