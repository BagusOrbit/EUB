<?php session_start();                           
    include_once '../../layout/webmin/navbar.php';    
  if (! isset($_SESSION['login']))
  {
    header('location:login.php');
  }

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

<div class="container">

    <h1>Masukkan Data Pertanyaan</h1></center>
    <form  role="form" method="post">
      <div class="form-group">
        <div>
          <label>Kode Makul</label>
          <input class="form-control" name="kode_makul">
        </div>
      </div>
      <div class="form-group">
        <div>
          <label>Kode Dosen</label>
          <input class="form-control" name="kode_dosen">
        </div>
      </div>
      <div class="form-group">
        <div>
          <label>Matakuliah</label>
          <input class="form-control" name="nama_makul">
        </div>
      </div>
      <div class="form-group">
        <div>
          <label>sks</label>
          <input class="form-control" name="sks">
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
    $kode_makul = $_POST['kode_makul'];
    $kode_dosen = $_POST['kode_dosen'];
    $nama_makul = $_POST['nama_makul'];
    $sks = $_POST['sks'];
    
    if ($kode_makul != null && $kode_dosen != null && $nama_makul != null && $sks !=null) 
    {
      $result = $repo->Save($kode_makul,$kode_dosen,$nama_makul,$sks);
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
      echo "Data harus lengkap";
    }
  }
?>