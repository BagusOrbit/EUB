<?php 
  require_once "repository.php";
  $repo = new Repository();
  $rows = $repo->getById($_GET['id']);
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
            <li><a href="../users/index.php">Users</a></li>
            <li><a href="index.php">Dosen</a></li>
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

    <h1>Edit Data Dosen</h1></center>
    <form  role="form" method="post">
    <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
      <div class="form-group">
        <div>
          <label>Kode Dosen</label>
          <input class="form-control" value="<?php echo $rows->kode_dosen; ?>" name="kode_dosen">
        </div>
      </div>
      <div class="form-group">
        <div>
          <label>Nama Dosen</label>
          <input class="form-control" value="<?php echo $rows->nama_dosen; ?>" name="nama_dosen">
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
    $id = $_POST['id'];
    $kode_dosen = $_POST['kode_dosen'];
    $nama_dosen = $_POST['nama_dosen'];
    if ($kode_dosen != null && $nama_dosen != null) 
    {
      $result = $repo->Update($kode_dosen,$nama_dosen,$id);
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