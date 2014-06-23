<?php session_start();                           
    
  if (! isset($_SESSION['login']))
  {
    header('location:../../login.php');
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


<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../../index2.php"><span class="glyphicon glyphicon-home" ></span>
Beranda</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-briefcase"></span> Master<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="../../master/users/index.php">Users</a></li>
            <li><a href="../../master/dosen/index.php">Dosen</a></li>
            <li><a href="#">Matakuliah</a></li>
            <li><a href="../../master/soal/index.php">Soal</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span>Laporan<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="../../laporan/dosen/index.php">Laporan Dosen</a></li>
            <li><a href="../../laporan/mahasiswa/index.php">Laporan Mahasiswa</a></li>
          </ul>
        </li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="logout.php" data-toggle="tooltip" data-placement="bottom" title="Log Out"><span class="glyphicon glyphicon-user"></span></a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
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

