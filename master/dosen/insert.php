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
  </head>
  
  <body>


<div class="container">

    <h1>Masukkan Data Dosen</h1></center>
    <form  role="form" method="post">
      <div class="form-group">
        <div>
          <label>Kode Dosen</label>
          <input class="form-control" name="kode_dosen">
        </div>
      </div>
      <div class="form-group">
        <div>
          <label>Nama Dosen</label>
          <input class="form-control"  name="nama_dosen">
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
     

</body>
</html>

<?php 
  if ($_POST) 
  {
    $kode_dosen = $_POST['kode_dosen'];
    $nama_dosen = $_POST['nama_dosen'];
    if ($kode_dosen != null && $nama_dosen != null) 
    {
      $result = $repo->Save($kode_dosen,$nama_dosen);
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