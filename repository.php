<?php
	require_once "koneksi/dbh.php";
	class Repository{
		private $dbh;
		private $query = "SELECT * FROM soal ORDER BY id";

		public function __construct()
		{
			$this->dbh = DBH::createConnection();
		}

		//mengambil semua data
		public function getAll()
		{
			$query = $this->dbh->prepare($this->query);
			$query->execute();
			$this->rowCount = $query->rowCount();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

		public function getCountDosenByKodeUser($kode_user)
		{
			$query = $this->dbh->prepare("SELECT * FROM dosen JOIN matakuliah ON dosen.kode_dosen=matakuliah.kode_dosen JOIN krs ON krs.kode_makul=matakuliah.kode_makul WHERE kode_user = '$kode_user'");
			$query->execute();
			$this->rowCount = $query->rowCount();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

		public function saveJawaban($kode_user,$kode_dosen,$kode_makul)
		{
			$sql = "INSERT INTO jawaban(kode_user,kode_dosen,kode_makul) VALUES(?,?,?)";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$kode_user);
			$query->bindParam(2,$kode_dosen);
			$query->bindParam(3,$kode_makul);
			// $query->lastInsertId();
			// return 	$query->execute();
			$query->execute();
			return $this->dbh->lastInsertId();
		}
		public function saveHasil($soal,$jawabans,$kode_jawaban)
		{
			$sql = "INSERT INTO hasil_jawaban(soal,jawaban,kode_jawaban) VALUES(?,?,?)";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$soal);
			$query->bindParam(2,$jawabans);
			$query->bindParam(3,$kode_jawaban);
			return 	$query->execute();	
		}
		public function kodeJawaban()
		{

		}
	}
?>