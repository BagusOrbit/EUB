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

		public function Save($kode_user,$kode_makul,$kode_dosen,$semester)
		{
			$sql = "INSERT INTO krs(kode_user,kode_makul,kode_dosen,semester) VALUES(?,?,?,?)";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$kode_user);
			$query->bindParam(2,$kode_makul);
			$query->bindParam(3,$kode_dosen);
			$query->bindParam(4,$semester);

			return 	$query->execute();
		}

		public function Update($kode_user,$kode_makul,$kode_dosen,$semester,$id)
		{
			$sql = "UPDATE krs SET kode_user=?, kode_makul=?, kode_dosen=?, semester=? WHERE id = ?";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$kode_user);
			$query->bindParam(2,$kode_makul);
			$query->bindParam(3,$kode_dosen);
			$query->bindParam(4,$semester);
			$query->bindParam(5,$id);
			return 	$query->execute();
		}

		public function getByKatakunci($katakunci)
		{
			$query = $this->dbh->prepare("SELECT * FROM krs WHERE kode_user LIKE ? OR kode_makul LIKE ? OR kode_dosen LIKE ?");
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