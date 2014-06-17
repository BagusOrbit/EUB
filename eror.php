<?php session_start();                           
		
	if (! isset($_SESSION['login']))
	{
		header('location:login.php');
	}
	include_once 'koneksi.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>eror</title>
</head>
<body>
<h1>EUb telah selesai dilakukan</h1>
<a href="logout.php">Logout</a>
</body>
</html>