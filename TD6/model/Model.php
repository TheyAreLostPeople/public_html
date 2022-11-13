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

		public static function selectAll() {
			$table_name = static::$object;
			$class_name = 'Model'.ucfirst($table_name);
			$req = Model::$pdo->query("SELECT * FROM $table_name");
			$req->setFetchMode(PDO::FETCH_CLASS,$class_name);
			$tab = $req->fetchAll();
			return $tab;
		}

		public static function select($primary_value) {
			$table_name = static::$object;
			$class_name = 'Model'.ucfirst($table_name);
			$primary_key = static::$primary;
			$sql = "SELECT * from $table_name WHERE $primary_key=:nom_tag;";
			// Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"nom_tag" => $primary_value,
				//nomdutag => valeur, ...
			);
			// On donne les valeurs et on exécute la requête
			$req_prep->execute($values);
			// On récupère les résultats comme précédemment
			$req_prep->setFetchMode(PDO::FETCH_CLASS,$class_name);
			$class_obj = $req_prep->fetchAll();
			// Attention, si il n'y a pas de résultats, on renvoie false
			if (empty($class_obj)) {
				return false;
			}
			return $class_obj[0];
		}

		public static function save($o) {
			$table_name = static::$object;
			$values = $o->getArrayOfAll();
			$sql_part1 = "INSERT INTO $table_name (";
			$sql_part2 = ") VALUES (";
			$sql_end = ");";
			foreach ($values as $column => $value) {
				$sql_part1 = $sql_part1."$column, ";
				$sql_part2 = $sql_part2.":$column, ";
			}
			$sql_part1 = rtrim($sql_part1, ", ");
			$sql_part2 = rtrim($sql_part2, ", ");
			$sql = $sql_part1.$sql_part2.$sql_end;
			$req_prep = Model::$pdo->prepare($sql);
			$req_prep->execute($values);
		}

		public static function update($o) {
			$table_name = static::$object;
			$primary_key = static::$primary;
			$values = $o->getArrayOfAll();
			$sql = "UPDATE $table_name SET ";
			foreach ($values as $column => $value) {
				$sql = $sql."$table_name.$column = :$column, ";
			}
			$sql = rtrim($sql, ", ");
			$sql = $sql." WHERE $table_name.$primary_key = :$primary_key;";
			$req_prep = Model::$pdo->prepare($sql);
			$req_prep->execute($values);
		}

		public static function delete($primary_value) {
			$table_name = static::$object;
			$primary_key = static::$primary;
			$sql = "DELETE FROM $table_name WHERE $table_name.$primary_key = :primary_value;";
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"primary_value" => $primary_value,
			);
			$req_prep->execute($values);
		}

	}
	
?>