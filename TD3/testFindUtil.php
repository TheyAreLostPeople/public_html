<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf_8" />
		<title>Sauvegarde d'une voiture</title>
	</head>

	<body>
		<?php
			if (isset($_GET['id_trajet'])) {
				require_once('fonctions.php');
				require_once('Trajet.php');
				require_once('Utilisateur.php');
				echo '<h1>Liste des passagers du trajet '.escape($_GET['id_trajet']).' :</h1>';
				$tableau_passagers = Trajet::findPassagers(escape($_GET['id_trajet']));
				foreach ($tableau_passagers as $utilisateur) {
					$utilisateur->afficher();
				}
			}
			else {
				echo '<h1>Le formulaire n'."'".'a pas été remplis correctement</h1>';
			}
		?>
	</body>

</html>