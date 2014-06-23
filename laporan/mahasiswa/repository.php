<?php 
	require_once "../../koneksi/dbh.php";

	class Repository{
		private $dbh;
		private $rowCount;
		private $query = "SELECT DISTINCT nama,fakultas,users.kode_user FROM jawaban JOIN users ON jawaban.kode_user = users.kode_user ORDER BY users.fakultas";
		private $rowCount1;
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

		public function getAllNoEub()
		{
			$query = $this->dbh->prepare("SELECT DISTINCT nama,fakultas,level,users.kode_user FROM users JOIN jawaban ON users.kode_user != jawaban.kode_user where users.level = 2");
			$query->execute();
			$this->rowCount = $query->rowCount();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
	}
?>