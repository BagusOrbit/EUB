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

    <h1>Masukkan Data KRS</h1></center>
    <form  role="form" method="post">
      <div class="form-group">
        <div>
          <label>Kode User</label>
          <input class="form-control" name="kode_user">
        </div>
      </div>
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
          <label>Semester</label>
          <input class="form-control" name="semester">
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
    $kode_user = $_POST['kode_user'];
    $kode_makul = $_POST['kode_makul'];
    $kode_dosen = $_POST['kode_dosen'];
    $semester = $_POST['semester'];
    
    if ($kode_user != null && $kode_makul != null && $kode_dosen != null) 
    {
      $result = $repo->Save($kode_user,$kode_makul,$kode_dosen,$semester);
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
      echo "Data harus dilengkapi";
    }
  }
?>