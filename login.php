<?php session_start();?>

<?php
	require_once "koneksi.php";
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login PPDS Anestesi</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/customes.css">
</head>
<body>
	<div class="row">
	<div class="col-md-4"></div>
	
	<div class="col-md-4">

		<div class="title"><h2>EUB LOGIN</h2></div>
			<form method="post" name="form" action="login.php" enctype="multipart/form-data">
				<div class="form-group">
					<div>
		            	<label>User</label>
						<input class="form-control" type="text" name="user" placeholder="masukkan user">
		            </div>
				</div>
				<div class="form-group">
					<div>
		            	<label>Password</label>
						<input class="form-control" type="password" name="password" placeholder="masukkan password">
		            </div>
				</div>	
				<button class="btn btn-success btn-lg btn-block" type="submit">Log In</button>
			</form>
			<?php 
	if ($_POST)
	{
		$user = mysql_real_escape_string ($_POST['user']);
		$password = mysql_real_escape_string (md5($_POST['password']));
		
		$query = sprintf("SELECT * FROM users WHERE kode_user = '%s' AND password = '%s'",$user,$password);
		$result = mysql_query($query) or die ('gagal query');
		$count = mysql_num_rows($result);
		$row = mysql_fetch_object($result);
		
		if ($count == 1) 
		{
			$_SESSION['login'] = 1;
			$_SESSION['user'] = $row->kode_user;


			header("location:index.php?dosen=0");
		}
		else
		{
			echo'<h3>Check Kembali User & Password nya !!</h3>';
		}
	}
?>

		<p class="text-center copyright"></p>
	</div>

	<div class="col-md-4"></div>
</div>


	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
