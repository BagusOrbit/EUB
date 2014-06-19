<?php 
	require_once "../../koneksi/dbh.php";

	class Repository{
		private $dbh;
		private $rowCount;
		private $query = "SELECT * FROM dosen ORDER BY kode_dosen";

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
			$query = $this->dbh->prepare("DELETE FROM dosen WHERE id=? ");
			$query->bindParam(1,$id);
			return $query->execute();
		}

		public function getById($id)
		{
			$query = $this->dbh->prepare("SELECT * FROM dosen WHERE id = ?");
			$query->bindParam(1,$id);
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}

		public function Save($kode_dosen,$nama_dosen)
		{
			$sql = "INSERT INTO dosen(kode_dosen,nama_dosen) VALUES(?,?)";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$kode_dosen);
			$query->bindParam(2,$nama_dosen);

			return 	$query->execute();
		}

		public function Update($kode_dosen,$nama_dosen,$id)
		{
			$sql = "UPDATE dosen SET kode_dosen=?, nama_dosen=? WHERE id = ?";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$kode_dosen);
			$query->bindParam(2,$nama_dosen);
			$query->bindParam(3,$id);
			return 	$query->execute();
		}

		public function getByKatakunci($katakunci)
		{
			$query = $this->dbh->prepare("SELECT * FROM dosen WHERE kode_dosen LIKE ? OR nama_dosen LIKE ?");
			$katakunci = "%".$katakunci."%";
			$query->bindParam(1,$katakunci);
			$query->bindParam(2,$katakunci);
			$query->execute();
			$this->rowCount = $query->rowCount();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

	}
?>