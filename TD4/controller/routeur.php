<?php
	$action = null;
	$argument = null;
	if (isset ($_GET['action'])) {
		$action = $_GET['action'];// On recupère l'action passée dans l'URL si remplis
	}
	if (isset ($_GET['immat'])) {
		$argument = $_GET['immat'];
	}
	if (isset ($_POST['immatriculation']) && isset ($_POST['marque']) && isset ($_POST['couleur'])) {
		//$action = 'created';
		require_once ('../model/ModelVoiture.php');
		$argument = new ModelVoiture($_POST['immatriculation'],$_POST['marque'],$_POST['couleur']);
	}
	
	// on récupère les fonctions du controller
	require_once 'ControllerVoiture.php';
	// si on a un argument, on le rajoute
	if ($action != null && $argument != null) {
		ControllerVoiture::$action($argument); // Appel de la méthode statique $action de ControllerVoiture
	}
	// sinon on n'utilise pas $argument
	elseif ($action != null) {
		ControllerVoiture::$action(); // Appel de la méthode statique $action de ControllerVoiture
	}
	else {
		echo 'Vous n'."'".'avez pas précisé l'."'".'action.';
	}
?>