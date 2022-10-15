<?php
	class Utilisateur {
		
		private $login;
		private $nom;
		private $prenom;
		
		public function getLogin() {
			return $this->login;
		}
		
		public function setLogin($login2) {
			$this->login = $login2;
		}
		
		public function getNom() {
			return $this->nom;
		}
		
		public function setNom($nom2) {
			$this->nom = $nom2;
		}
		
		public function getPrenom() {
			return $this->prenom;
		}
		
		public function setPrenom($prenom2) {
			$this->prenom = $prenom2;
		}
		
		// un constructeur
		public function __construct($l = NULL, $n = NULL, $p = NULL) {
			if (!is_null($l) && !is_null($n) && !is_null($p)) {
				$this->login = $l;
				$this->nom = $n;
				$this->prenom = $p;
			}
			
		}
		
		// une methode d'affichage.
		public function afficher() {
			echo '
				Les informations de l'."'".'utilisateur :
				<ul>
					<li> Son login : '.$this->login.'</li>
					<li> Son nom : '.$this->nom.'</li>
					<li> Son prenom : '.$this->prenom.'</li>
				</ul>
			';
		}

		public static function getAllUtilisateurs() {
			require_once "Model.php";
			$bdd = Model::Init();
			$req = $bdd->query("SELECT * FROM utilisateur");
			$req->setFetchMode(PDO::FETCH_CLASS,'Utilisateur');
			$tab_voit = $req->fetchAll();

			foreach($tab_voit as $row) {
				$row->afficher();
			}
		}
	}
?>