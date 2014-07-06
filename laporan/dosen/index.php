<?php session_start();                           
  
  
  if (! isset($_SESSION['login']))
  {
    header('location:../../login.php');
  }
  
  $level = $_SESSION['level'];
  
  if ($level=='3' )
  {
  	include_once '../../layout/user/headerPimpinan.php';		
  	include_once '../../layout/user/navbarPimpinan.php';	
  }
  else
  {
  	include_once '../../layout/webmin/navbar.php';
  }

	require_once "repository.php";
	$repo = new Repository();
	$result = $repo->getAll();
	// var_dump($result);
	// exit();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>System Management</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/customes.css">
</head>
<body>



<div class="container">
<center><h1>Laporan Dosen EUB</h1></center>
<h3>Data Dosen EUB</h3>
<table>
	<table class="table table-bordered">
		<tr>
			<th width="20">No.</th>
			<th>Kode Dosen</th>
			<th>Nama Dosen</th>
			<th>Detail</th>
		</tr>
		<?php
			$no = 1;
			foreach ($result as $row) 
				{
		?>

		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->kode_dosen; ?></td>
			<td><?php echo $row->nama_dosen; ?></td>
			<td><a href=""><button class="btn btn-success"><i class="glyphicon glyphicon-folder-open"></i></button></a>
			</td>
		</tr>

		<?php
			}
		?>

		<tr>
			<td colspan="4">
				<?php 
					echo "Total data :".$repo->rowCount();
				?>
			</td>
		</tr>
	</table>
</table>
	
</div>
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/bootstrap.min.js"></script>

	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

