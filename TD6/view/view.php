<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF_8">
		<title><?php echo $pagetitle; ?></title>
	</head>
	<body>

		<nav style="display: flex;flex-direction: row;">

			<div style="border: 1px solid black;text-align:center;">
				<a href="index.php?controller=voiture&action=readAll">Gestion des voitures</a>
			</div>

			<div style="border: 1px solid black;text-align:center;">
				<a href="index.php?controller=utilisateur&action=readAll">Gestion des utilisateurs</a>
			</div>

			<div style="border: 1px solid black;text-align:center;">
				<a href="index.php?controller=trajet&action=readAll">Gestion des trajets</a>
			</div>

		</nav>

		<?php
			// Si $controleur='voiture' et $view='list',
			// alors $filepath="/chemin_du_site/view/voiture/list.php"
			$filepath = File::build_path(array("view", $controller, "$view.php"));
			require $filepath;
		?>
	</body>

	<footer>

		<p style="border: 1px solid black;text-align:right;padding-right:1em;">
		Site de covoiturage de HYNKO Alexis
		</p>

	</footer>
	
</html>