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

    <h1>Edit Data KRS</h1></center>
    <form  role="form" method="post">
    <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
      <div class="form-group">
        <div>
          <label>Kode User</label>
          <input class="form-control" value="<?php echo $rows->kode_user; ?>" name="kode_user">
        </div>
      </div>
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
          <label>Semester</label>
          <input class="form-control" value="<?php echo $rows->semester; ?>" name="semester">
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
    $kode_user = $_POST['kode_user'];
    $kode_makul = $_POST['kode_makul'];
    $kode_dosen = $_POST['kode_dosen'];
    $semester = $_POST['semester'];
    if ($kode_user != null && $kode_makul != null && $kode_dosen != null) 
    {
      $result = $repo->Update($kode_user,$kode_makul,$kode_dosen,$semester,$id);
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