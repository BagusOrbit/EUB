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
	<title>EROR</title>
</head>
<body>
<h1>Semua data harus di isi</h1>
<a href="index.php?dosen=0">back</a>
</body>
</html>