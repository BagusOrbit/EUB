<?php 

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db   = 'eub';

	@mysql_connect($host,$user,$pass) or die('Gagal Koneksi Database!!!');
	@mysql_select_db($db) or die('Gagal Memilih Database');
	
?>