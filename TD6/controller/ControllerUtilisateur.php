<?php
	require_once (File::build_path(['model','ModelUtilisateur.php'])); // chargement du modèle

	class ControllerUtilisateur {

		protected static $object = 'utilisateur';

		public static function readAll() {
			$tab_u = ModelUtilisateur::selectAll(); //appel au modèle pour gerer la BD
			$controller = static::$object;
			$view = 'list';
			$pagetitle = 'Liste des utilisateurs';
			require (File::build_path(['view','view.php'])); //redirige vers la vue
		}
		public static function read($argument) {
			$u = ModelUtilisateur::select($argument);
			if ($u != NULL) {
				$controller = static::$object;
				$view = 'detail';
				$pagetitle = 'Detail des Utilisateurs';
				require (File::build_path(['view','view.php']));
			}
			else {
				$controller = static::$object;
				$view = 'error';
				$pagetitle = 'Une erreur est survenue';
				require (File::build_path(['view','view.php']));
			}
		}
		public static function delete($argument) {
			ModelUtilisateur::delete($argument);// supression de la voiture
			$login = $argument;// on garde le login pour pouvoir l'afficher dans une vue
			$tab_u = ModelUtilisateur::selectAll();// puis affichage de toutes les voitures pour pouvoir verrifier
			$controller = static::$object;
			$view = 'deleted';
			$pagetitle = 'L'."'".'utilisateur a bien été supprimée !';
			require (File::build_path(['view','view.php']));
		}
	}
?>