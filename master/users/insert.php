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