<?php 
	class DBH {
		private static $dns="mysql:dbname=eub;host=localhost;";
		private static $user = "root";
		private static $pass= "admin";


		public static function createConnection()
		{
			return new PDO(self::$dns,self::$user,self::$pass);
		}
	}

?>