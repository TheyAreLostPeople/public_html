<?php
	require_once "Voiture.php";
	echo '
		<h3>Liste de toutes les voitures :</h3>

		<div>
	';
			Voiture::getAllVoitures();
	echo '
		</div>

		<h3>La voiture d'."'".'immatriculation AB500072 :</h3>

		<div>
	';
			Voiture::getVoitureByImmat('AB500072')->afficher();
	echo '
		</div>

		<h3>Sauvegarde  d'."'".'une nouvelle voiture :</h3>

		<div>
	';
			Voiture::save(new Voiture('ZEE05000','Tesla','Bleu'));
			Voiture::getAllVoitures();
	echo '
		</div>
	';
?>