<?php
	require_once ('../model/ModelVoiture.php'); // chargement du modèle
	class ControllerVoiture {
		public static function readAll() {
			$tab_v = ModelVoiture::getAllVoitures(); //appel au modèle pour gerer la BD
			require ('../view/voiture/list.php'); //redirige vers la vue
		}
		public static function read($argument) {
			$v = ModelVoiture::getVoitureByImmat($argument);
			if ($v != NULL) {
				require ('../view/voiture/detail.php');
			}
			else {
				require ('../view/voiture/error.php');
			}
		}
		public static function create() {
			require ('../view/voiture/create.php');
		}
		
		public static function created($argument) {
			ModelVoiture::save($argument);// sauvegarde de la voiture
			$tab_v = ModelVoiture::getAllVoitures();// puis affichage de toutes les voitures pour pouvoir verrifier
			require ('../view/voiture/list.php');
		}
	}
?>