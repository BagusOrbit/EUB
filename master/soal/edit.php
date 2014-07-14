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

    <h1>Edit Data Dosen</h1></center>
    <form  role="form" method="post">
    <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
      <div class="form-group">
        <div>
          <label>Pertanyaan</label>
          <input class="form-control" value="<?php echo $rows->soal; ?>" name="soal">
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
    $soal = $_POST['soal'];
    
    if ($soal != null) 
    {
      $result = $repo->Update($soal,$id);
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