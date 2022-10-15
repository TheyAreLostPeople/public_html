<?php
	require_once "Model.php";
	$bdd = Model::Init();
	
	class Voiture {
		
		private $immatriculation;
		private $marque;
		private $couleur;
		
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

		public static function getAllVoitures() {
			$req = $bdd->query("SELECT * FROM voiture");
			$req->setFetchMode(PDO::FETCH_CLASS,'Voiture');
			$tab_voit = $req->fetchAll();

			foreach($tab_voit as $row) {
				$row->afficher();
			}
		}

		public static function getVoitureByImmat($immat) {
			$sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
			// Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"nom_tag" => $immat,
				//nomdutag => valeur, ...
			);
			// On donne les valeurs et on exécute la requête
			$req_prep->execute($values);
			// On récupère les résultats comme précédemment
			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
			$tab_voit = $req_prep->fetchAll();
			// Attention, si il n'y a pas de résultats, on renvoie false
			if (empty($tab_voit))
				return false;
			return $tab_voit[0];
		}

		public static function save($v) {
			$sql = "INSERT INTO voiture (immatriculation, marque, couleur) VALUES (:immatriculation, :marque, :couleur)";
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"immatriculation" => $v->getImmatriculation(),
				"marque" => $v->getMarque(),
				"couleur" => $v->getCouleur(),
			);
			$req_prep->execute($values);
		}

	}
?>