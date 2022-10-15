<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf_8" />
		<title> Insérer le titre ici </title>
	</head>
	<body>
		Voici le résultat du script PHP :
		<?php
			$voiture1 = Array (
				'marque' => 'Renault',
				'couleur' => 'bleu',
				'immatriculation' => '256AB34',
			);
			$voiture2 = Array (
				'marque' => 'Peujot',
				'couleur' => 'rouge',
				'immatriculation' => '655PB34',
			);
			$voiture3 = Array (
				'marque' => 'Volsvagen',
				'couleur' => 'vert',
				'immatriculation' => '111MB00',
			);
			$voiture = Array (
				0 => $voiture1,
				1 => $voiture2,
				2 => $voiture3,
			);
			$vide = true;
			for ($i=0;$i<count($voiture);$i++) {
				if ($i == 0) {
					$vide = false;
					echo '
						<h1>Liste des voitures</h1>
						<ul>
					';
				}
				echo '
					<li>
						Voiture '.$voiture[$i]['immatriculation'].' de marque '.$voiture[$i]['marque'].' (couleur '.$voiture[$i]['couleur'].') 
					</li>
				';
				if ($i+1 == count($voiture)) {
					echo '</ul>';
				}
			}
			if ($vide == true) {
				echo '
					<h1>Désolé</h1>
					Il n’y a aucune voiture.
					<br>(deux accrents possible : ’ et '."'".')
				';
			}
		?>
	</body>

</html>