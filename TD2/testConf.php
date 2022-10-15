<?php

	require_once 'Conf.php';
	echo 'Hostname : '.Conf::getHostname().'<br>';
	echo 'Database : '.Conf::getDatabase().'<br>';
	echo 'Login : '.Conf::getLogin().'<br>';
	echo 'Password : '.Conf::getPassword().'<br>';

?>