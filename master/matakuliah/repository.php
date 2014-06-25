<?php 
	require_once "../../koneksi/dbh.php";

	class Repository{
		private $dbh;
		private $rowCount;
		private $query = "SELECT * FROM matakuliah ORDER BY id";

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
			$query = $this->dbh->prepare("DELETE FROM matakuliah WHERE id=? ");
			$query->bindParam(1,$id);
			return $query->execute();
		}

		public function getById($id)
		{
			$query = $this->dbh->prepare("SELECT * FROM matakuliah WHERE id = ?");
			$query->bindParam(1,$id);
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}

		public function Save($kode_makul,$kode_dosen,$nama_makul,$sks)
		{
			$sql = "INSERT INTO matakuliah(kode_makul,kode_dosen,nama_makul,sks) VALUES(?,?,?,?)";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$kode_makul);
			$query->bindParam(2,$kode_dosen);
			$query->bindParam(3,$nama_makul);
			$query->bindParam(4,$sks);
			return 	$query->execute();
		}

		public function Update($kode_makul,$kode_dosen,$nama_makul,$sks,$id)
		{
			$sql = "UPDATE matakuliah SET kode_makul=?, kode_dosen=?, nama_makul=?, sks=? WHERE id = ?";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$kode_makul);
			$query->bindParam(2,$kode_dosen);
			$query->bindParam(3,$nama_makul);
			$query->bindParam(4,$sks);
			$query->bindParam(5,$id);
			return 	$query->execute();
		}

		public function getByKatakunci($katakunci)
		{
			$query = $this->dbh->prepare("SELECT * FROM matakuliah WHERE kode_makul LIKE ? OR kode_dosen LIKE ? OR nama_makul LIKE ?");
			$katakunci = "%".$katakunci."%";
			$query->bindParam(1,$katakunci);
			$query->bindParam(2,$katakunci);
			$query->bindParam(3,$katakunci);

			$query->execute();
			$this->rowCount = $query->rowCount();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

	}
?>