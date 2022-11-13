<?php
	require_once (File::build_path(['model','Model.php']));
	$bdd = Model::Init();

	class ModelTrajet extends Model {
		
		private $id;
		private $depart;
		private $arrivee;
		private $date;
		private $nbplaces;
		private $prix;
		private $conducteur_login;

		protected static $object = 'trajet';
		protected static $primary = 'id';
		
		public function get($nom_attribut) {
			return $this->$nom_attribut;
		}
		
		public function set($nom_attribut,$valeur) {
			$this->$nom_attribut = $valeur;
		}

		public function getArrayOfAll() {
			return array(
				'id' => $this->get('id'),
				'depart' => $this->get('depart'),
				'arrivee' => $this->get('arrivee'),
				'date' => $this->get('date'),
				'nbplaces' => $this->get('nbplaces'),
				'prix' => $this->get('prix'),
				'conducteur_login' => $this->get('conducteur_login'),
			);
		}
		
		public function __construct($id = NULL, $depart = NULL, $arrivee = NULL, $date = NULL, $nbplaces = NULL, $prix = NULL, $conducteur_login = NULL) {
			if (!is_null($id) && !is_null($depart) && !is_null($arrivee) && !is_null($date) && !is_null($nbplaces) && !is_null($prix) && !is_null($conducteur_login)) {
				$this->id = $id;
				$this->depart = $depart;
				$this->arrivee = $arrivee;
				$this->date = $date;
				$this->nbplaces = $nbplaces;
				$this->prix = $prix;
				$this->conducteur_login = $conducteur_login;
			}
			
		}
		
		/*
		// une methode d'affichage.
		public function afficher() {
			echo '
				Les informations du trajet :
				<ul>
					<li> id : '.$this->id.'</li>
					<li> Lieu de départ : '.$this->depart.'</li>
					<li> Lieu d'."'".'arrivée : '.$this->arrivee.'</li>
					<li> Date : '.$this->date.'</li>
					<li> Nombre de places : '.$this->nbplaces.'</li>
					<li> Prix : '.$this->prix.'</li>
					<li> Login du conducteur : '.$this->conducteur_login.'</li>
				</ul>
			';
		}
		*/

		public static function findPassagers($trajet_id) {
			$sql = "SELECT utilisateur.* FROM utilisateur INNER JOIN trajet WHERE trajet.id = :trajet_id;";
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"trajet_id" => $trajet_id,
			);
			$req_prep->execute($values);
			$req_prep->setFetchMode(PDO::FETCH_CLASS,'ModelUtilisateur');
			$tab_util = $req_prep->fetchAll();
			return$tab_util;
		}
	}
?>