<?PHP 
//Untuk mengvalidasi file CSV, munculkan error jika yang di upload bukan file csv. 
if($_FILES["file"]["type"] != "text/csv"){ 
	die("Ini bukan file CSV."); 
} elseif(is_uploaded_file($_FILES['file']['tmp_name'])){ 
	//Koneksi ke database 
	$dbhost = 'localhost'; 
	$dbuser = 'root'; 
	$dbpass = 'admin'; 
	$dbname = 'eub'; 
	$link = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql server'); 
	mysql_select_db($dbname);  
	//Baca file CSV 

	$handle = fopen($_FILES['file']['tmp_name'], "r");
	$data = fgetcsv($handle, 1000, ","); 
	 //Hilangkan bagian ini, jika file CVSnya tidak ada baris header (cuma data saja). 
	switch ($_POST['jenis']) {
		case 'dosen':
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {  
			$no= mysql_real_escape_string($data[0]); 
			$kode_dosen = mysql_real_escape_string($data[1]); 
			 $nama_dosen= mysql_real_escape_string($data[2]); 
			 $sql = "INSERT INTO `dosen` (`kode_dosen`,`nama_dosen`) VALUES ('" . $kode_dosen . "','" . $nama_dosen  . "')";  
			 mysql_query($sql)or die("query salah bro= ".mysql_error()); 
		 	}
			break;
		case 'krs':
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {  
			$no= mysql_real_escape_string($data[0]); 
			$kode_user = mysql_real_escape_string($data[1]); 
			 $kode_makul = mysql_real_escape_string($data[2]); 
			 $kode_dosen = mysql_real_escape_string($data[3]);
			 $smtr = mysql_real_escape_string($data[4]);
			 $sql = "INSERT INTO `krs` (`kode_user`,`kode_makul`, `kode_dosen`, `semester`) VALUES ('" . $kode_user . "','" . $kode_makul. "','" . $kode_dosen . "','" . $smtr . "')";  
			 mysql_query($sql)or die("query salah bro= ".mysql_error()); 
		 	}
			break;
		case 'matkul':
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {  
			$no= mysql_real_escape_string($data[0]); 
			$kode_makul = mysql_real_escape_string($data[1]); 
			 $kode_dosen = mysql_real_escape_string($data[2]); 
			 $nama_makul = mysql_real_escape_string($data[3]);
			 $sks = mysql_real_escape_string($data[4]);
			 $sql = "INSERT INTO `matakuliah` (`kode_makul`,`kode_dosen`, `nama_makul`, `sks`) VALUES ('" . $kode_makul . "','" . $kode_dosen. "','" . $nama_makul . "','" . $sks . "')";  
			 mysql_query($sql)or die("query salah bro= ".mysql_error()); 
		 	}
			break;

		default:
			# code...
			break;
	}
		 
	mysql_close($link); 
	echo "Data sudah berhasil diupload";
	//header('Location: ../../wwwroot/admin/');
 } else{
	die("Error"); 
 } 
 ?>
