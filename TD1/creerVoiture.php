<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf_8" />
		<title> Insérer le titre ici </title>
	</head>
	<body>
		<?php
			if (isset($_POST['immatriculation']) && isset($_POST['marque']) && isset($_POST['couleur'])) {
				require_once('fonctions.php');
				require_once('Voiture.php');
				$voiture1 = new Voiture(escape($_POST['immatriculation']),escape($_POST['marque']),escape($_POST['couleur']));
				$voiture1->afficher();
		
				//test
				$immatriculation = $_POST['immatriculation'];
				$marque = $_POST['marque'];
				$couleur = $_POST['couleur'];
			}
			else {
				echo '<h1>Le formulaire n'."'".'a pas été remplis correctement</h1>';
			}
		?>
	</body>

</html>