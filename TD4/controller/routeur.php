<?php
	require_once 'ControllerVoiture.php';
	// On recupère l'action passée dans l'URL
	$action = $_GET['action'];
	ControllerVoiture::$action(); // Appel de la méthode statique $action de ControllerVoiture
?>