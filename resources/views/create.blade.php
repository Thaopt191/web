<?php
// Start the session
session_start();
?>

@extends('templates.template')
 
@section('content')
<html>
<h1>Thêm tài khoản mới</h1>
	<div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" id="input" type="button" data-toggle="dropdown">Choose type:</button>
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a onclick = "checkType(this)" href="#">Giảng viên</a></li>
          <li><a onclick = "checkType(this)" href="#">Sinh viên</a></li>
        </ul>
      </div>

	{!! Form::open() !!}
 		{!! Form::label('ma','mã:', ['class' => 'ma']) !!} </br>
		{!! Form::text('ma', "", ['class' => 'ma']) !!} </br>
	 		
	 	{!! Form::label('ho_ten','họ tên:', ['class' => 'ho_ten']) !!} </br>
		{!! Form::text('ho_ten', "", ['class' => 'ho_ten']) !!} </br>

		{!! Form::label('email','vnu email:', ['class' => 'email']) !!} </br>
		{!! Form::email('email', "", ['class' => 'email']) !!} </br>

		{!! Form::label('khoa_hoc','khóa học:', ['class' => 'khoa_hoc']) !!} </br>
	  	{!! Form::text('khoa_hoc', "", ['class' => 'khoa_hoc']) !!} </br>

		{!! Form::label('ctdt',' chương trình đào tạo:', ['class' => 'ctdt']) !!} </br>
		{!! Form::text('ctdt', "", ['class' => 'ctdt']) !!} </br>
	 		
	 	{!! Form::label('don_vi','đơn vị:', ['class' => 'don_vi']) !!} </br>
		{!! Form::text('don_vi', "", ['class' => 'don_vi']) !!} </br>

		{!! Form::submit('Them moi')!!}
	{!! Form::close() !!}
	
</html>

<script type="text/javascript">
	var checkType = function(item) {
          var input = document.getElementById("input");
          var type = item.innerHTML;

           input.innerHTML = type;
 
           if(type == "Giảng viên") {
           	hideEle(don_vi);
           	showEle(khoa_hoc);
           	showEle(ctdt);
           }

           if(type == "Sinh viên") {
           	showEle(don_vi);
           	hideEle(khoa_hoc);
           	hideEle(ctdt);
           }
    }

    var hideEle = function(id) {
    	var ele = document.getElementsByClassName(id);
    	console.log(ele);
    	ele.forEach(hide); 
    }

    var hide = function() {
    	this.style.display="none";
    }	

    var showEle = function(id) {
    	var ele = document.getElementsByClassName(id);
    	console.log(ele);
    	ele.forEach(show);
    }

    var show = function() {
    	this.style.display="";
    }
</script>

@stop