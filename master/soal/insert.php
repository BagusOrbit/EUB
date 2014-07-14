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