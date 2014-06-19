<?php 
  require_once "repository.php";
  $repo = new Repository();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Name Aplikasi</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/customes.css">
  </head>
  
  <body>
<font color="white" face="elephant"><center><h1>Nama Instasi</h1></center></font>
    <font color="white"><i><marquee>Selamat Datang Di Aplikasi ....
    </marquee></i>
   </font>

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
      <a class="navbar-brand" href="../../index2.php"><span class="glyphicon glyphicon-home" ></span>
Beranda</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-briefcase"></span> Master<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="index.php">Users</a></li>
            <li><a href="../dosen/index.php">Dosen</a></li>
            <li><a href="#">Matakuliah</a></li>
            <li><a href="../soal/index.php">Soal</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span>Laporan<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Laporan </a></li>
            <li><a href="#">Laporan </a></li>
            <li><a href="#">Laporan</a></li>
          </ul>
        </li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="../../logout.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">

    <h1>Masukkan Data Pengguna</h1></center>
    <form  role="form" method="post">
      <div class="form-group">
        <div>
          <label>Kode Pengguna</label>
          <input class="form-control" name="kode_user">
        </div>
      </div>
      <div class="form-group">
        <div>
          <label>Nama Pengguna</label>
          <input class="form-control"  name="nama_user">
        </div>
      </div>
      <div class="form-group">
        <div>
          <label>Fakultas / Jabatan</label>
          <input class="form-control"  name="fakultas">
        </div>
      </div>
      <div class="form-group">
        <div>
          <label>Angkatan</label>
          <input class="form-control"  name="angkatan">
        </div>
      </div>
      <div class="form-group">
        <div>
          <label>Password</label>
          <input type="password" class="form-control"  name="password">
        </div>
      </div>
      <div class="form-group">
        <div>
          <label>Level</label>
          <input class="form-control"  name="level">
        </div>
      </div>
      <div class="form-group">
        <div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="index.php"><button type="button" class="btn btn-success">Batal</button></a>
        </div>
      </div>

    </form>

</div>
     

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/bootstrap.min.js"></script>

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
  if ($_POST) 
  {
    $kode_user = $_POST['kode_user'];
    $nama = $_POST['nama_user'];
    $fakultas = $_POST['fakultas'];
    $angkatan = $_POST['angkatan'];
    $level = $_POST['level'];
    $password = mysql_real_escape_string (md5($_POST['password']));

    if ($kode_user != null && $nama != null && $password !=null && $level !=null)
    {
      $result = $repo->Save($kode_user,$nama,$fakultas,$password,$level,$angkatan);
      if ($result) 
      {
        header("location:index.php");
      }
      else
      {
        echo "Data gagal disimpan";
      }
    }
    else
    {
      echo "Data nama harus diisi";
    }
  }
?>