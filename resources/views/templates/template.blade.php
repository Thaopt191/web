<!DOCTYPE html>
<html lang="en">
<head>
  <title>WAD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">WAD</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
    <?php

      if (!Session::has('userid')){
        echo "<li><a href=\"signin\"><span class=\"glyphicon glyphicon-log-in\"></span> Đăng nhập</a></li>";
        echo "<li><a href=\"signup\"><span class=\"glyphicon glyphicon-log-in\"></span> Đăng ký</a></li>";
      } else{
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "qldt";

          // Create connection
          $conn = mysqli_connect($servername, $username, $password, $dbname);

          // Check connection
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

        $id = Session::get('userid');  

        $sql = "SELECT * FROM tai_khoan WHERE id = $id";
        $result = $conn -> query($sql);
        $row = $result -> fetch_assoc();
        $username = $row['name'];
        echo "<li><a href=\"#\"><span class='glyphicon glyphicon-user'></span> ". $username."</a></li>";
        echo "<li><a href=\"logout\"><span class='glyphicon glyphicon-log-in'></span> Đăng xuất</a></li>";
      }
    ?>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="create">Create</a></p>
      <p><a href="upload">Upload</a></p>
      <p><a href="update">Update</a></p>
      <p><a href="">Select</a></p>
    </div>

    <div class="col-sm-10 text-left">
      @yield('content')
    </div>

  </div>
</div>



<footer class="container-fluid text-center">
  <p>WAD</p>
</footer>

</body>
</html>