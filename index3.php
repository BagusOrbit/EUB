<?php session_start();                           
	include_once 'layout/user/header.php';
	include_once 'layout/user/navbarPimpinan.php';
	if (! isset($_SESSION['login']))
	{
		header('location:login.php');
	}

	include_once 'koneksi.php';

 	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>System Management</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/customes.css">
</head>
<body>
<center><font color="white"><h2>Selamat Datang</h2></font></center>
<center>
<div class="container">
<div class="bs-example">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="img/billboard2.jpg" alt="First slide" width="730">
        </div>
        <div class="item">
          <img src="img/billboard2.jpg" alt="First slide" width="730">
        </div>
        <div class="item">
          <img src="img/billboard2.jpg" alt="First slide" width="730">
        </div>
      </div>
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
  </div>
 </center>

</div>

	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

