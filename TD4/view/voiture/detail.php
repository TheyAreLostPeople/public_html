<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF_8">
		<title>Liste des voitures</title>
	</head>

	<body>
		<?php
			echo '
				Les informations de ce véhicule :
				<ul>
					<li> Son immatriculation : '.$v->getImmatriculation().'</li>
					<li> Sa marque : '.$v->getMarque().'</li>
					<li> Sa couleur : '.$v->getCouleur().'</li>
				</ul>
			';
		?>
	</body>
</html>