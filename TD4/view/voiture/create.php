<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf_8" />
		<title> Insérer le titre ici </title>
	</head>
	<body>
		<form method="post" action="../controller/routeur.php?action=created">
			<fieldset>
				<legend>Mon formulaire :</legend>
				<p>
					<label for="immat_id">Immatriculation</label> :
					<input type="text" placeholder="Ex : 256AB34" name="immatriculation" id="immat_id" required/>
				</p>
				<p>
					<label for="marque_id">Marque</label>
					<input type="text" placeholder="Ex : Peujot" name="marque" id="marque_id" required/>
				</p>
				<p>
					<label for="couleur_id">Couleur</label>
					<input type="text" placeholder="Ex : Rouge" name="couleur" id="couleur_id" required/>
				</p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset>
		</form>
	</body>

</html>