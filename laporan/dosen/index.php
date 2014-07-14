<?php session_start();                           
  function connect()
{
    $conn=mysql_connect('localhost','root','admin');
    mysql_select_db('eub',$conn);
}
  
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
	connect();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>System Management</title>
	
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
			<td><?php echo $row->kode_dosen; 
					$kodedos=$row->kode_dosen;
				?></td>
			<td><?php echo $row->nama_dosen; ?></td>
			<td><a href="#" data-toggle="modal" data-target=".pop-up-<?php echo $row->kode_dosen;?>"><button class="btn btn-success"><?php echo $row->total; ?> &nbsp<i class="glyphicon glyphicon-folder-open"></i></button></a>
			</td>
			<!-- Modal -->
<div class="modal fade pop-up-<?php echo $row->kode_dosen;?>" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#signin" data-toggle="tab">Detail Nilai</a></li>
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
        	<h3>Nilai Dosen <?php echo $row->nama_dosen;?></h3>
        	<!-- diquery menggunakan=>> SELECT *, sum(hj.jawaban) as subtotal FROM jawaban j join hasil_jawaban hj on j.id =hj.kode_jawaban where j.kode_dosen='d002' GROUP BY hj.soal  -->
        	<ul>
        		
        	<?php 

				$query4 = "SELECT *, sum(hj.jawaban) as subtotal FROM jawaban j join hasil_jawaban hj on j.id =hj.kode_jawaban where j.kode_dosen='".$kodedos."' GROUP BY hj.soal ORDER BY hj.soal";
			    $action4 = mysql_query($query4);
			    //$data4 = mysql_fetch_array($action4);
			    
			    while ($data4 = mysql_fetch_array($action4))
    				{
    		?>
    				<li>Total Nilai untuk Soal <?php echo $data4[6] ?> : <?php echo $data4[8] ?></li>
    		<?php
    				}
        	?>
        		<hr size="10px">
        		<li>Total Nilai : <?php echo $row->total;?></li>
        	</ul>
        	


            <p></p>
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

</body>
</html>

