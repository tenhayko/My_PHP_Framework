<?php 
	class DB
	{
		public static function connect()
		{
			$db = new PDO('mysql:host=localhost;dbname=MyFramework;charset=utf8mb4', 'root', '');
			return $db;
		}
	}
?>