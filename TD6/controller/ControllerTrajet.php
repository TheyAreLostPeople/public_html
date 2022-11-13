<?php
	require_once (File::build_path(['model','ModelTrajet.php'])); // chargement du modèle

	class ControllerTrajet {

		protected static $object = 'trajet';

		public static function readAll() {
			$tab_t = ModelTrajet::selectAll(); //appel au modèle pour gerer la BD
			$controller = static::$object;
			$view = 'list';
			$pagetitle = 'Liste des trajets';
			require (File::build_path(['view','view.php'])); //redirige vers la vue
		}
		public static function read($argument) {
			$t = ModelTrajet::select($argument);
			if ($t != NULL) {
				$controller = static::$object;
				$view = 'detail';
				$pagetitle = 'Detail des trajets';
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
			$champ_action = 'created';
			$readonly = '';// on ne doit pas utiliser readonly
			$t_form = new ModelTrajet('','','','','','','');
			$controller = static::$object;
			$view = 'update';
			$pagetitle = 'Formulaire de création de trajet';
			require (File::build_path(['view','view.php']));
		}
		public static function created($argument) {
			ModelTrajet::save($argument);// sauvegarde du trajet
			$tab_t = ModelTrajet::selectAll();// puis affichage de tout les trajets
			$controller = static::$object;
			$view = 'created';
			$pagetitle = 'Le trajet a bien été créée !';
			require (File::build_path(['view','view.php']));
		}
		public static function update($argument) {
			$champ_action = 'updated';
			$readonly = ' readonly';// on doit utiliser redaonly
			$t_form = ModelTrajet::select($argument);// on récupère le trajet
			$controller = static::$object;// on affiche le formulaire
			$view = 'update';
			$pagetitle = 'Formulaire de mise à jour de trajet';
			require (File::build_path(['view','view.php']));
		}
		public static function updated($argument) {
			ModelTrajet::update($argument);// mise à jour du trajet
			$id = $argument->get('id');// on garde l'id pour pouvoir l'afficher dans une vue
			$tab_t = ModelTrajet::selectAll();// puis affichage de toutes les trajets pour pouvoir verrifier
			$controller = static::$object;
			$view = 'updated';
			$pagetitle = 'Le trajet a bien été mise à jour !';
			require (File::build_path(['view','view.php']));
		}
		public static function delete($argument) {
			ModelTrajet::delete($argument);// supression du trajet
			$id = $argument;// on garde l'id pour pouvoir l'afficher dans une vue
			$tab_t = ModelTrajet::selectAll();// puis affichage de tout les trajets pour pouvoir verrifier
			$controller = static::$object;
			$view = 'deleted';
			$pagetitle = 'Le trajet a bien été supprimée !';
			require (File::build_path(['view','view.php']));
		}
	}
?>