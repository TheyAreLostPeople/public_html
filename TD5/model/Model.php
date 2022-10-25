<?php
	require_once (File::build_path(['config','Conf.php']));

	class Model {
		
		public static $pdo;
		
		/*
		public function __constr(){
			self::Init();
			
		}
		*/
		
		public static function Init() {
			try {
				self::$pdo = new PDO(
					'mysql:host='.Conf::getHostname().';dbname='.Conf::getDatabase().';charset=utf8',
					Conf::getLogin(),
					Conf::getPassword(),
					array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
				);
			} catch(PDOException $e) {
				echo $e->getMessage(); // affiche un message d'erreur
				die();
			}
			self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return self::$pdo;
		}
		
		/*
		public static function getPDO() {
			if (is_null(self::$pdo)) {
				self::$pdo = self::Init();
			}
			return self::$pdo;
		}
		*/

	}
	
?>