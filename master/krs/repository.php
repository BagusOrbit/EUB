<?php 
	require_once "../../koneksi/dbh.php";

	class Repository{
		private $dbh;
		private $rowCount;
		private $query = "SELECT * FROM krs ORDER BY id";

		public function __construct()
		{
			$this->dbh = DBH::createConnection();
		}

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

		public function Delete($id)
		{
			$query = $this->dbh->prepare("DELETE FROM krs WHERE id=? ");
			$query->bindParam(1,$id);
			return $query->execute();
		}

		public function getById($id)
		{
			$query = $this->dbh->prepare("SELECT * FROM krs WHERE id = ?");
			$query->bindParam(1,$id);
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}

		public function Save($soal)
		{
			$sql = "INSERT INTO soal(soal) VALUES(?)";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$soal);

			return 	$query->execute();
		}

		public function Update($soal,$id)
		{
			$sql = "UPDATE soal SET soal=? WHERE id = ?";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$soal);
			$query->bindParam(2,$id);
			return 	$query->execute();
		}

		public function getByKatakunci($katakunci)
		{
			$query = $this->dbh->prepare("SELECT * FROM soal WHERE soal LIKE ?");
			$katakunci = "%".$katakunci."%";
			$query->bindParam(1,$katakunci);
			$query->execute();
			$this->rowCount = $query->rowCount();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

	}
?>