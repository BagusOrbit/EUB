<?php 
	require_once "../../koneksi/dbh.php";

	class Repository{
		private $dbh;
		private $rowCount;
		private $query = "SELECT * FROM users ORDER BY kode_user";

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
			$query = $this->dbh->prepare("DELETE FROM users WHERE id=? ");
			$query->bindParam(1,$id);
			return $query->execute();
		}

		public function getById($id)
		{
			$query = $this->dbh->prepare("SELECT * FROM users WHERE id = ?");
			$query->bindParam(1,$id);
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}

		public function Save($kode_user,$nama,$fakultas,$password,$level,$angkatan)
		{
			$sql = "INSERT INTO users(kode_user,nama,fakultas,password,level,angkatan) VALUES(?,?,?,?,?,?)";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$kode_user);
			$query->bindParam(2,$nama);
			$query->bindParam(3,$fakultas);
			$query->bindParam(4,$password);
			$query->bindParam(5,$level);
			$query->bindParam(6,$angkatan);
			return 	$query->execute();
		}

		public function Update($kode_user,$nama,$fakultas,$password,$level,$angkatan,$id)
		{
			$sql = "UPDATE users SET kode_user=?, nama=?,fakultas=?,password=?,level=?,angkatan=? WHERE id = ?";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$kode_user);
			$query->bindParam(2,$nama);
			$query->bindParam(3,$fakultas);
			$query->bindParam(4,$password);
			$query->bindParam(5,$level);
			$query->bindParam(6,$angkatan);
			$query->bindParam(7,$id);
			return 	$query->execute();
		}

		public function getByKatakunci($katakunci)
		{
			$query = $this->dbh->prepare("SELECT * FROM users WHERE kode_user LIKE ? OR nama LIKE ? OR fakultas LIKE ?");
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