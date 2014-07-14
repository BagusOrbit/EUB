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
			<button class="btn btn-primary btn-lg" href="#signup" data-toggle="modal" data-target=".bs-modal-sm">Import</button>
		</div>
	</div>
	
	<table class="table table-bordered">
		<tr>
			<th width="20">No.</th>
			<th>Kode Mahasiswa</th>
			<th>Kode Makul</th>
			<th>Kode Dosen</th>
			<th>Semester</th>
		</tr>
		<?php
			$no = 1;
			foreach ($result as $row) 
				{
		?>

		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->kode_user; ?></td>
			<td><?php echo $row->kode_makul; ?></td>
			<td><?php echo $row->kode_dosen; ?></td>
			<td><?php echo $row->semester; ?></td>
			<td align="right">
			<a href="edit.php?id=<?php echo $row->id; ?>"><button class="btn btn-info" ><i class="glyphicon glyphicon-edit"></i></button></a>
			<a href="index.php?id=<?php echo $row->id; ?>&aksi=hapus" onclick="return confirm('Yakin akan di hapus');"><button class="btn btn-danger" ><i class="glyphicon glyphicon-remove"></i></button></a>
			</td>
		</tr>

		<?php
			}
		?>

		<tr>
			<td colspan="5">
				<?php
					echo "Total data :".$repo->rowCount();
				?>
			</td>
		</tr>
	</table>

</div>
<!-- Modal -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#signin" data-toggle="tab">Import File</a></li>
              <li class=""><a href="#why" data-toggle="tab">Caranya?</a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in" id="why">
        <p>Pastikan File yang di upload adalah file CSV, pastikan kolom dalam file csv sudah sesuai dengan kolom di database </p>
        <p></p><br> Please contact <a mailto:href="admin@eub"></a>Admin@evaldos</a> for any other inquiries.</p>
        </div>
        <div class="tab-pane fade active in" id="signin">
            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="../../importcsv/importCSV.php">
            <fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">File CSV :</label>
              <div class="controls">
                <input required="" name="file" type="file" required="">
                <input type="hidden" name="jenis" value="krs">
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <button id="import" name="import" class="btn btn-success">import</button>
              </div>
            </div>
            </fieldset>
            </form>
        </div>
        
    </div>
      </div>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>
</div>	
</body>
</html>