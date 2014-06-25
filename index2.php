<?php session_start();                           
    
  if (! isset($_SESSION['login']))
  {
    header('location:login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Name Aplikasi</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/customes.css">
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
  
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home" ></span>
Beranda</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-briefcase"></span> Master<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="master/users/index.php">Users</a></li>
            <li><a href="master/dosen/index.php">Dosen</a></li>
            <li><a href="master/matakuliah/index.php">Matakuliah</a></li>
            <li><a href="master/soal/index.php">Soal</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span>Laporan<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="laporan/dosen/index.php">Laporan Dosen</a></li>
            <li><a href="laporan/mahasiswa/index.php">Laporan Mahasiswa</a></li>
          </ul>
        </li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="logout.php" data-toggle="tooltip" data-placement="bottom" title="Log Out"><span class="glyphicon glyphicon-user"></span></a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<center><font color="white"><h2>Selamat Datang Di Admin EUB</h2></font></center>
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
          <img src="img/billboard2.jpg" data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" >
        </div>
        <div class="item">
          <img src="img/billboard2.jpg" data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" >
        </div>
        <div class="item">
          <img src="img/billboard2.jpg" data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide">
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
<!-- <footer class="bs-docs-footer" role="contentinfo">
  <div class="container">
    <a href="http://www.bagusorbit.com">Bagus Orbit</a>&nbsp; &copy; 2014 -  - Corporation
  </div>
</footer> -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>