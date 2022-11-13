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
				$pagetitle = 'Detail des utilisateurs';
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
			$u_form = new ModelUtilisateur('','','');
			$controller = static::$object;
			$view = 'update';
			$pagetitle = 'Formulaire de création d'."'".'utilisateur';
			require (File::build_path(['view','view.php']));
		}
		public static function created($argument) {
			ModelUtilisateur::save($argument);// sauvegarde de l'utilisateur
			$tab_u = ModelUtilisateur::selectAll();// puis affichage de tout les utilisateurs
			$controller = static::$object;
			$view = 'created';
			$pagetitle = 'L'."'".'utilisateur a bien été créée !';
			require (File::build_path(['view','view.php']));
		}
		public static function update($argument) {
			$champ_action = 'updated';
			$readonly = ' readonly';// on doit utiliser redaonly
			$u_form = ModelUtilisateur::select($argument);// on récupère l'utilisateur
			$controller = static::$object;// on affiche le formulaire
			$view = 'update';
			$pagetitle = 'Formulaire de mise à jour d'."'".'utilisateur';
			require (File::build_path(['view','view.php']));
		}
		public static function updated($argument) {
			ModelUtilisateur::update($argument);// mise à jour de l'utilisateur
			$login = $argument->getLogin();// on garde le login pour pouvoir l'afficher dans une vue
			$tab_u = ModelUtilisateur::selectAll();// puis affichage de toutes les utilisateurs pour pouvoir verrifier
			$controller = static::$object;
			$view = 'updated';
			$pagetitle = 'L'."'".'utilisateur a bien été mise à jour !';
			require (File::build_path(['view','view.php']));
		}
		public static function delete($argument) {
			ModelUtilisateur::delete($argument);// supression de l'utilisateur
			$login = $argument;// on garde le login pour pouvoir l'afficher dans une vue
			$tab_u = ModelUtilisateur::selectAll();// puis affichage de tout les utilisateurs pour pouvoir verrifier
			$controller = static::$object;
			$view = 'deleted';
			$pagetitle = 'L'."'".'utilisateur a bien été supprimée !';
			require (File::build_path(['view','view.php']));
		}
	}
?>