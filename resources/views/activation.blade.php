<?php
// Start the session
session_start();
?>

@extends('templates.template')
 
@section('content')
<html>
<h3>{{$msg}}</h3>
<?php
  if($tai_khoan != NULL) {
    echo 
    
    "<ul>
      <li>
        id : ".$tai_khoan->id." | 
        name : ".$tai_khoan->name." | 
        password : ".$tai_khoan->password." | 
        email : ".$tai_khoan->email." | 
        loai_tai_khoan : ".$tai_khoan->loai_tai_khoan." | 
        activated : ".$tai_khoan->activated."
      </li>
    </ul>";
  }
?>  

</html>
@stop