<?php
// Start the session
session_start();
?>

@extends('templates.template')
 
@section('content')
<html>
<h3>Upload excel file</h3>
<form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	Select file : <input type="file" name="file" size="20" /><br />

	{!! Form::label('loai_tai_khoan', 'Type:') !!}
	 {!! Form::radio('loai_tai_khoan', 'khoa', true) !!} Khoa
	 {!! Form::radio('loai_tai_khoan', 'giang_vien') !!} Giảng viên
	 {!! Form::radio('loai_tai_khoan', 'sinh_vien') !!} Sinh viên </br>

    <input type="submit" value="Upload" name="ok" />
</form>

</html>
@stop