<?php session_start();                           
    include_once '../../layout/webmin/navbar.php';  
  if (! isset($_SESSION['login']))
  {
    header('location:login.php');
  }

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
  </head>
  
  <body>

<div class="container">

    <h1>Edit Data Matakuliah</h1></center>
    <form  role="form" method="post">
    <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
      <div class="form-group">
        <div>
          <label>Kode Makul</label>
          <input class="form-control" value="<?php echo $rows->kode_makul; ?>" name="kode_makul">
        </div>
      </div>
      <div class="form-group">
        <div>
          <label>Kode Dosen</label>
          <input class="form-control" value="<?php echo $rows->kode_dosen; ?>" name="kode_dosen">
        </div>
      </div>
      <div class="form-group">
        <div>
          <label>Matakuliah</label>
          <input class="form-control" value="<?php echo $rows->nama_makul; ?>" name="nama_makul">
        </div>
      </div>
      <div class="form-group">
        <div>
          <label>sks</label>
          <input class="form-control" value="<?php echo $rows->sks; ?>" name="sks">
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
    $id = $_POST['id'];
    $kode_makul = $_POST['kode_makul'];
    $kode_dosen = $_POST['kode_dosen'];
    $nama_makul = $_POST['nama_makul'];
    $sks = $_POST['sks'];
    if ($kode_makul != null && $kode_dosen != null && $nama_makul != null && $sks !=null) 
    {
      $result = $repo->Update($kode_makul,$kode_dosen,$nama_makul,$sks,$id);
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