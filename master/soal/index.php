<?php session_start();                           
		include_once '../../layout/webmin/navbar.php';    
  if (! isset($_SESSION['login']))
  {
    header('location:login.php');
  }

require_once "repository.php";
$repo = new Repository();

if (isset($_GET['aksi']) and $_GET['aksi'] == 'hapus') 
	{
		if ($repo->delete($_GET['id'])) 
		{
			header("location:index.php");
		}
		else
		{
			echo "Data gagal di hapus";
		}
	}

if (isset($_GET['q'])) 
	{
		
		$result = $repo->getByKatakunci($_GET['q']);
	}
	else
	{
		$result= $repo->getAll();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eub Application</title>
    
</head>
<body>


<div class="container">
<h1>Data Pertanyaan EUB</h1>
	<div class="row">
		<div class="col-md-4">
			<form class="form-inline" method="get">
				<input type="text" class="form-control" placeholder="cari" name="q">
				<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i></button>
			</form><br>
		</div>
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4" align="right" >
			<a href="insert.php"><button class="btn btn-primary" ><i class="glyphicon glyphicon-plus"></i></button></a>
		</div>
	</div>
	
	<table class="table table-bordered">
		<tr>
			<th width="20">No.</th>
			<th>Pertanyaan</th>
		</tr>
		<?php
			$no = 1;
			foreach ($result as $row) 
				{
		?>

		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->soal; ?></td>
			<td align="right">
			<a href="edit.php?id=<?php echo $row->id; ?>"><button class="btn btn-info" ><i class="glyphicon glyphicon-edit"></i></button></a>
			<a href="index.php?id=<?php echo $row->id; ?>&aksi=hapus" onclick="return confirm('Yakin akan di hapus');"><button class="btn btn-danger" ><i class="glyphicon glyphicon-remove"></i></button></a>
			</td>
		</tr>

		<?php
			}
		?>

		<tr>
			<td colspan="3">
				<?php
					echo "Total data :".$repo->rowCount();
				?>
			</td>
		</tr>
	</table>

</div>
	
</body>
</html>