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
          <label>Pertanyaan</label>
          <input class="form-control" name="soal">
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
    $soal = $_POST['soal'];
    
    if ($soal != null) 
    {
      $result = $repo->Save($soal);
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