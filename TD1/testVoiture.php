<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf_8" />
		<title> Insérer le titre ici </title>
	</head>
	<body>
		<?php
			require_once('Voiture.php');
			$voiture1 = new Voiture('Renault','rouge','4BG66644');
			$voiture1->afficher();
		?>
	</body>

</html>