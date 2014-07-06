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
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/customes.css">
  </head>
  
  <body>


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