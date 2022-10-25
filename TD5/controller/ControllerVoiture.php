<?php
	require_once (File::build_path(['model','ModelVoiture.php'])); // chargement du modèle
	class ControllerVoiture {
		public static function readAll() {
			$tab_v = ModelVoiture::getAllVoitures(); //appel au modèle pour gerer la BD
			$controller = 'voiture';
			$view = 'list';
			$pagetitle = 'Liste des voitures';
			require (File::build_path(['view','view.php'])); //redirige vers la vue
		}
		public static function read($argument) {
			$v = ModelVoiture::getVoitureByImmat($argument);
			if ($v != NULL) {
				$controller = 'voiture';
				$view = 'detail';
				$pagetitle = 'Detail des voitures';
				require (File::build_path(['view','view.php']));
			}
			else {
				$controller = 'voiture';
				$view = 'error';
				$pagetitle = 'Une erreur est survenue';
				require (File::build_path(['view','view.php']));
			}
		}
		public static function create() {
			$controller = 'voiture';
			$view = 'create';
			$pagetitle = 'Formulaire de création de voiture';
			require (File::build_path(['view','view.php']));
		}
		
		public static function created($argument) {
			ModelVoiture::save($argument);// sauvegarde de la voiture
			$tab_v = ModelVoiture::getAllVoitures();// puis affichage de toutes les voitures pour pouvoir verrifier
			$controller = 'voiture';
			$view = 'created';
			$pagetitle = 'La voiture a bien été créée !';
			require (File::build_path(['view','view.php']));
		}
	}
?>