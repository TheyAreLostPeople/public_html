<?php
	class Trajet {
		
		private $id;
		private $depart;
		private $arrivee;
		private $date;
		private $nbplaces;
		private $prix;
		private $conducteur_login;
		
		public function get($nom_attribut) {
			return $this->$nom_attribut;
		}
		
		public function set($nom_attribut,$valeur) {
			$this->$nom_attribut = $valeur;
		}
		
		public function __construct($id, $depart, $arrivee, $date, $nbplaces, $prix, $conducteur_login) {
			$this->id = $id;
			$this->depart = $depart;
			$this->arrivee = $arrivee;
			$this->date = $date;
			$this->nbplaces = $nbplaces;
			$this->prix = $prix;
			$this->conducteur_login = $conducteur_login;
		}
		
		// une methode d'affichage.
		public function afficher() {
			echo '
				Les informations du trajet :
				<ul>
					<li> Son login : '.$this->id.'</li>
					<li> Son nom : '.$this->details.'</li>
					<li> Son prenom : '.$this->arrivee.'</li>
				</ul>
			';
		}
	}
?>