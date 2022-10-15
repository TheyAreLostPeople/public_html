<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf_8" />
		<title>Sauvegarde d'une voiture</title>
	</head>
	<body>
		<?php
			if (isset($_POST['immatriculation']) && isset($_POST['marque']) && isset($_POST['couleur'])) {
				echo 'Sauvegarde de la voiture :';
				require_once('fonctions.php');
				require_once('Voiture.php');
				$voiture1 = new Voiture(escape($_POST['immatriculation']),escape($_POST['marque']),escape($_POST['couleur']));
				$voiture1->afficher();
				try {
					Voiture::save($voiture1);
				} catch (PDOException $e) {
					echo $e->getMessage();
					die();
				}
			}
			else {
				echo '<h1>Le formulaire n'."'".'a pas été remplis correctement</h1>';
			}
		?>
	</body>

</html>