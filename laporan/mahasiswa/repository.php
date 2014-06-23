<?php 
	require_once "../../koneksi/dbh.php";

	class Repository{
		private $dbh;
		private $rowCount;
		private $query = "SELECT DISTINCT nama,fakultas FROM jawaban JOIN users ON jawaban.kode_user = users.kode_user ORDER BY users.fakultas";

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