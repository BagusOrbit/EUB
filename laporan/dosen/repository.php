<?php 
	require_once "../../koneksi/dbh.php";

	class Repository{
		private $dbh;
		private $rowCount;
		private $query = "SELECT DISTINCT dosen.kode_dosen,nama_dosen FROM dosen JOIN jawaban ON dosen.kode_dosen = jawaban.kode_dosen JOIN hasil_jawaban ON jawaban.id = hasil_jawaban.kode_jawaban ";

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

		public function rowCount()
		{
			return $this->rowCount;
		}
	}
?>