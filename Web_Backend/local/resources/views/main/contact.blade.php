@extends('layout.main')


@section('content')
     <!-- Three columns of text below the carousel -->
      <div class="row" style="margin-top: 20px;">
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        	<div class="alert alert-info">
        		<strong> <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> ติดต่อเรา</strong> 
        	</div>
        	
          <blockquote>
            <p>ที่ติดต่อ มนต์รักบ้านสวน</p>
            <footer>ชื่อ  : <cite> {!! $contact->name !!} </cite></footer>
            <footer>ที่อยู่  : <cite> {!! $contact->address !!} </cite></footer>
            <footer>เบอร์โทร  : <cite> {!! $contact->phone !!} </cite></footer>
            <footer>Line  : <cite> {!! $contact->line !!} </cite></footer>
            <footer>FaceBook  : <cite> {!! $contact->facebook !!} </cite></footer>
            <footer>E-Mail  : <cite> {!! $contact->email !!} </cite></footer>
          </blockquote>

        </div>

      </div><!-- /.row -->


@endsection