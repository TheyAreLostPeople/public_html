<?php
	$controller = 'voiture';
	$action = 'readAll';
	$argument = null;
	if (isset ($_GET['controller'])) {
		$controller = $_GET['controller'];// On recupère le nom du controller si passée dans l'URL
	}
	if (isset ($_GET['action'])) {
		$action = $_GET['action'];// On recupère l'action si passée dans l'URL
	}
	if (isset ($_GET['immat'])) {
		$argument = $_GET['immat'];
	}
	if (isset ($_GET['login'])) {
		$argument = $_GET['login'];
	}
	if (isset ($_POST['immatriculation']) && isset ($_POST['marque']) && isset ($_POST['couleur'])) {// on récupère le contenu des formulaires
		if ($action == 'created') {
			require_once (File::build_path(['model','ModelVoiture.php']));
			$argument = new ModelVoiture($_POST['immatriculation'],$_POST['marque'],$_POST['couleur']);
		}
		elseif ($action == 'updated') {
			require_once (File::build_path(['model','ModelVoiture.php']));
			$argument = array(
				"immatriculation" => $_POST['immatriculation'],
				"marque" => $_POST['marque'],
				"couleur" => $_POST['couleur'],
			);
		}
		else {
			$controller = 'voiture';
			$view = 'error';
			$pagetitle = 'Une erreur est survenue';
			require (File::build_path(['view','view.php']));
		}
	}
	
	// on récupère le nom du bon controller
	$controller_class = 'Controller'.ucfirst($controller);
	// on importe les classes pour pouvoir verrifier et les utiliser plus tard
	require_once (File::build_path(['controller','ControllerVoiture.php']));
	require_once (File::build_path(['controller','ControllerUtilisateur.php']));
	// on verrifie si la classe donnée existe
	if (class_exists($controller_class)) {
		// on verrifie que l'action donné existe
		if (in_array($action, get_class_methods($controller_class))) {
			// si on a un argument, on le rajoute
			if ($argument != null) {
				$controller_class::$action($argument); // Appel de la méthode statique $action de ControllerVoiture
			}
			// sinon on n'utilise pas $argument
			else {
				$controller_class::$action(); // Appel de la méthode statique $action de ControllerVoiture
			}
		}
		else {// si l'action n'existe pas, on retourne une erreur
			$controller = 'voiture';
			$view = 'error';
			$pagetitle = 'Une erreur est survenue';
			require (File::build_path(['view','view.php']));
		}
	}
	else {// si le controller n'existe pas, on retourne une erreur
		$controller = 'voiture';
		$view = 'error';
		$pagetitle = 'Une erreur est survenue';
		require (File::build_path(['view','view.php']));
	}
?>