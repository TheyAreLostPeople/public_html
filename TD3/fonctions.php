<?php
function getBdd() {
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=projet_gestion_de_films;charset=utf8', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
	}
	catch (Exception $e) {
		die('Erreur fatale : ' . $e->getMessage());
	}
}
function escape($valeur) {
	return htmlspecialchars($valeur,ENT_QUOTES,'UTF-8',false);
}
?>