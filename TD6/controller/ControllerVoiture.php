<?php
	require_once (File::build_path(['model','ModelVoiture.php'])); // chargement du modèle
	
	class ControllerVoiture {

		protected static $object = 'voiture';

		public static function readAll() {
			$tab_v = ModelVoiture::selectAll(); //appel au modèle pour gerer la BD
			$controller = static::$object;
			$view = 'list';
			$pagetitle = 'Liste des voitures';
			require (File::build_path(['view','view.php'])); //redirige vers la vue
		}
		public static function read($argument) {
			$v = ModelVoiture::select($argument);
			if ($v != NULL) {
				$controller = static::$object;
				$view = 'detail';
				$pagetitle = 'Detail des voitures';
				require (File::build_path(['view','view.php']));
			}
			else {
				$controller = static::$object;
				$view = 'error';
				$pagetitle = 'Une erreur est survenue';
				require (File::build_path(['view','view.php']));
			}
		}
		public static function create() {
			$controller = static::$object;
			$view = 'create';
			$pagetitle = 'Formulaire de création de voiture';
			require (File::build_path(['view','view.php']));
		}
		public static function created($argument) {
			ModelVoiture::save($argument);// sauvegarde de la voiture
			$tab_v = ModelVoiture::selectAll();// puis affichage de toutes les voitures pour pouvoir verrifier
			$controller = static::$object;
			$view = 'created';
			$pagetitle = 'La voiture a bien été créée !';
			require (File::build_path(['view','view.php']));
		}
		public static function update($argument) {
			$v_update = ModelVoiture::select($argument);// on récupère la voiture
			$controller = static::$object;// on affiche le formulaire
			$view = 'update';
			$pagetitle = 'Formulaire de mise à jour de voiture';
			require (File::build_path(['view','view.php']));
		}
		public static function updated($argument) {
			ModelVoiture::update($argument);// mise à jour de la voiture
			$immat = $argument['immatriculation'];// on garde l'imatriculation pour pouvoir l'afficher dans une vue
			$tab_v = ModelVoiture::selectAll();// puis affichage de toutes les voitures pour pouvoir verrifier
			$controller = static::$object;
			$view = 'updated';
			$pagetitle = 'La voiture a bien été mise à jour !';
			require (File::build_path(['view','view.php']));
		}
		public static function delete($argument) {
			ModelVoiture::delete($argument);// supression de la voiture
			$immat = $argument;// on garde l'imatriculation pour pouvoir l'afficher dans une vue
			$tab_v = ModelVoiture::selectAll();// puis affichage de toutes les voitures pour pouvoir verrifier
			$controller = static::$object;
			$view = 'deleted';
			$pagetitle = 'La voiture a bien été supprimée !';
			require (File::build_path(['view','view.php']));
		}
	}
?>