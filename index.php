<?php session_start();                           
		
	if (! isset($_SESSION['login']))
	{
		header('location:login.php');
	}

	include_once 'koneksi.php';

 	require_once "repository.php";
 	
 	$repo = new Repository();
 	$result = $repo->getAll();
 	$dosen = $repo->getCountDosenByKodeUser($_SESSION['user']);
 	$countDosen = count($dosen);
 	if ($_GET['dosen']  >= $countDosen) 
 	{
 		header("location:eror.php");
 	}
 	$currentDosen = $dosen[$_GET['dosen']];
 	

 	
  
	if ($_POST) 
	{
		$kode_user = $_SESSION['user'];
		
		$kode_dosen = $currentDosen->kode_dosen;
		$kode_makul = $currentDosen->kode_makul;
		
		$resultHasil1 = $repo->saveJawaban($kode_user,$kode_dosen,$kode_makul);
		// var_dump($resultHasil1);
		// exit();
		$kode_jawaban = $resultHasil1;
		$soals = $_POST['soal'];
		foreach ($soals as $soal) 
		{
			$jawaban = 'pilihan'.trim($soal);
			$jawabans = $_POST[$jawaban];
			
			$resultHasil = $repo->saveHasil($soal,$jawabans,$kode_jawaban);
			if ($resultHasil1 && $resultHasil) 
			{
				$dosen = intval($_GET['dosen']) + 1;
				// var_dump("location:index.php?dosen=".$doses);
				// exit();
				header("location:index.php?dosen=".$dosen);
			}
			else
			{
				echo "gagal Disimpan";
			}
		}
		
		
		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>System Management</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/customes.css">
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">Log Out</a></li>
            
          </ul>
        </li>
      </ul>
	</div>
</nav>

<!-- <div class="container">
	<div class="row">
		<div class="col-md-8">
			
				<img class="img-cyrcle" src="mg/brosur depan baru.jpg" width="700">
				
		</div>
		<div class="col-md-4">
			<h2>Evaluasi Untuk Belajar</h2>
		</div>
			
	</div>
</div> -->


<div class="row">
  <div class="col-md-6 col-md-offset-3">
  
  
	<center>
	<h3>DATA DOSEN</h3>
		<table>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php echo "&nbsp;".$currentDosen->nama_dosen; ?></td>
			</tr>
			<tr>
				<td>Matakuliah</td>
				<td>:</td>
				<td><?php echo "&nbsp;".$currentDosen->nama_makul; ?></td>
			</tr>
		</table>
	</center>
		
  </div>
</div>

<hr>

<div class="container">
	<form method="post" action="index.php?dosen=<?php echo $_GET['dosen']; ?>">
	<?php 
		$no = 1;
		foreach ($result as $row) 
		{
	?>
	
	<div>
		<?php	echo $no++."."; ?>
		<?php	echo "&nbsp;".$row->soal; ?>
		<input type="hidden" name="soal[]" value="<?php echo $row->id; ?> ">
		<div class="radio">
		<input type="radio" name="pilihan<?php echo $row->id;?>" value="1">Ya	
		</div>
		<div class="radio">
		<input type="radio" name="pilihan<?php echo $row->id;?>" value="2">Tidak
		</div>
		<div class="radio">
		<input type="radio" name="pilihan<?php echo $row->id;?>" value="3">Tidak Tahu
		</div>
	</div>
	
	<?php
		}
	?>
	<button class="btn btn-success btn-lg btn-block" type="submit">Simpan</button>
    </form>  
    </div>
</div>
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

