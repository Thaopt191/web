<?php
// Start the session
session_start();
?>

@extends('templates.template')
 
@section('content')
<html>
<h1>Cập nhật thông tin</h1>
	{!! Form::open() !!}
		@if($loai_tai_khoan == "sinh_vien")
			{!! Form::label('ma','mã:') !!}
			{!! Form::text('ma') !!} </br>

			{!! Form::label('password','Password:') !!}
			{!! Form::password('password', ['id' => 'password']) !!} </br>
	 		
	 		{!! Form::label('ho_ten','họ tên:') !!}
			{!! Form::text('ho_ten') !!} </br>

			{!! Form::label('khoa_hoc','khóa học:') !!}
	  		{!! Form::text('khoa_hoc') !!} </br>

			{!! Form::label('ctdt',' chương trình đào tạo:') !!}
			{!! Form::text('ctdt') !!} </br>
	 		
	 		{!! Form::label('email','vnu email:') !!}
			{!! Form::email('email') !!} </br>
    	@endif

    	@if($loai_tai_khoan == "giang_vien")
			{!! Form::label('ma_can_bo','mã cán bộ:') !!}
	  		{!! Form::text('ma_can_bo') !!} </br>

	  		{!! Form::label('password','Password:') !!}
			{!! Form::password('password', ['id' => 'password']) !!} </br>

			{!! Form::label('ho_ten',' họ tên:') !!}
			{!! Form::text('ho_ten') !!} </br>
	 		
	 		{!! Form::label('don_vi','đơn vị:') !!}
			{!! Form::text('don_vi') !!} </br>

			{!! Form::label('email','vnu email:') !!}
	  		{!! Form::email('email') !!} </br>
    	@endif
 		
		{!! Form::submit('Them moi')!!}
	{!! Form::close() !!}
	
</html>
@stop