<?php
	require_once (File::build_path(['model','Model.php']));
	$bdd = Model::Init();
	
	class ModelVoiture extends Model {
		
		private $immatriculation;
		private $marque;
		private $couleur;

		protected static $object = 'voiture';
		protected static $primary = 'immatriculation';
		
		// un getter
		public function getMarque() {
			return $this->marque;
		}
		
		// un setter
		public function setMarque($marque2) {
			$this->marque = $marque2;
		}
		
		public function getCouleur() {
			return $this->couleur;
		}
		
		public function setCouleur($couleur2) {
			$this->couleur = $couleur2;
		}
		
		public function getImmatriculation() {
			return $this->immatriculation;
		}
		
		public function setImmatriculation($immatriculation2) {
			if (strlen($immatriculation2)<=8) {
				$this->immatriculation = $immatriculation2;
			}
			else {
				return 'L'."'".'immatriculation ne doit pas faire plus de 8 caractères.';
			}
		}
		
		// un constructeur
		public function __construct($i = NULL, $m = NULL, $c = NULL) {
			if (!is_null($i) && !is_null($m) && !is_null($c)) {
				$this->immatriculation = $i;
				$this->marque = $m;
				$this->couleur = $c;
			}
		}
		
		/*
		
		// une methode d'affichage.
		public function afficher() {
			echo '
				Les informations de ce véhicule :
				<ul>
					<li> Son immatriculation : '.$this->immatriculation.'</li>
					<li> Sa marque : '.$this->marque.'</li>
					<li> Sa couleur : '.$this->couleur.'</li>
				</ul>
			';
		}
		
		*/

		public static function save($v) {
			$sql = "INSERT INTO voiture (immatriculation, marque, couleur) VALUES (:immatriculation, :marque, :couleur);";
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"immatriculation" => $v->getImmatriculation(),
				"marque" => $v->getMarque(),
				"couleur" => $v->getCouleur(),
			);
			$req_prep->execute($values);
		}

		public static function update($data) {
			$sql = "UPDATE voiture SET voiture.marque = :marque, voiture.couleur = :couleur WHERE voiture.immatriculation = :immatriculation;";
			$req_prep = Model::$pdo->prepare($sql);
			$req_prep->execute($data);
		}

	}
?>