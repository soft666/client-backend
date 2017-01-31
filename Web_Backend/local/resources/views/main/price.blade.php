@extends('layout.main')


@section('content')
     <!-- Three columns of text below the carousel -->
      <div class="row" style="margin-top: 20px;">

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
					<tr>
						<td class="text-center">บ้านพักหนึ่ง</td>
						<td class="text-center">2</td>
						<td class="text-center">2000 บ</td>
					</tr>
				</tbody>
			</table>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        	<div class="alert alert-info">
        		<strong>สิ่งอำนวยความสะดวก </strong>
        	</div>

			<table class="table table-bordered table-hover">
				<thead>
					@foreach($service as $value)
						<tr>
							<th>{!! $value->name !!}</th>
						</tr>
					@endforeach
					 
				</thead>
			</table>

        </div>

      </div><!-- /.row -->


@endsection
