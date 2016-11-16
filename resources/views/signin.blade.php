<?php
// Start the session
session_start();
?>

@extends('templates.template')
 
@section('content')
<html>
<h1>Đăng nhập</h1>
	{!! Form::open() !!}
 		{!! Form::label('name','Name:') !!}
  		{!! Form::text('name') !!} </br>

		{!! Form::label('password','Password:') !!}
		{!! Form::password('password', ['id' => 'password']) !!} </br>

		{!! Form::submit('Them moi')!!}
	{!! Form::close() !!}
	
</html>
@stop