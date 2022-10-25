<?php

	class Conf {

		static private $databases = array(
			'hostname' => 'localhost',
			'database' => 'TP_MVC_TD02',
			'login' => 'root',
			'password' => ''
		);

		static public function getHostname() {
			return self::$databases['hostname'];
		}

		static public function getDatabase() {
			return self::$databases['database'];
		}

		static public function getLogin() {
			return self::$databases['login'];
		}

		static public function getPassword() {
			return self::$databases['password'];
		}

	}

?>