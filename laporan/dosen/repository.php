<?php 
	require_once "../../koneksi/dbh.php";

	class Repository{
		private $dbh;
		private $rowCount;
		private $query = "SELECT vw.kode_dosen,ds.nama_dosen, sum(subtotal) as total from dosen ds join vw_hasil vw on ds.kode_dosen= vw.kode_dosen  GROUP by vw.kode_dosen";

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