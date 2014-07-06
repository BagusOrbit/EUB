<?php session_start();                           
	include_once 'layout/user/header.php';
	include_once 'layout/user/navbarUser.php';
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
			if ($jawabans != null) 
			{
				$resultHasil = $repo->saveHasil($soal,$jawabans,$kode_jawaban);
				if ($resultHasil1 && $resultHasil) 
				{
					$dosen = intval($_GET['dosen']) + 1;
					// var_dump("location:index.php?dosen=".$doses);
					// exit();
					header("location:index1.php?dosen=".$dosen);
				}
				else
				{
					echo "gagal Disimpan";
				}	
			}
			else
			{
				header("location:eror2.php");
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

<div class="container">
<center>
	<font color="green" face="elephant"><h3>DATA DOSEN<span class="glyphicon glyphicon-list-alt"></span></h3></font>
		<table>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php echo "&nbsp;".$currentDosen->nama_dosen; ?></td>
			</tr>
			<tr>
				<td width="100">Matakuliah</td>
				<td>:</td>
				<td><?php echo "&nbsp;".$currentDosen->nama_makul; ?></td>
			</tr>
		</table>
	</center>
	<form method="post" action="index1.php?dosen=<?php echo $_GET['dosen']; ?>">
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

