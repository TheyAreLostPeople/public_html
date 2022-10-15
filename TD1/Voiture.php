<?php
	class Voiture {
		
		private $marque;
		private $couleur;
		private $immatriculation;
		
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
		public function __construct($m, $c, $i) {
			$this->marque = $m;
			$this->couleur = $c;
			$this->immatriculation = $i;
		}
		
		// une methode d'affichage.
		public function afficher() {
			echo '
				Les informations de ce véhicule :
				<ul>
					<li> Sa marque : '.$this->marque.'</li>
					<li> Sa couleur : '.$this->couleur.'</li>
					<li> Son immatriculation : '.$this->immatriculation.'</li>
				</ul>
			';
		}
	}
?>