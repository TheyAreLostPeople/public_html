<?php
	$vImmatriculation = htmlspecialchars($v_update->getImmatriculation());
	$vMarque = htmlspecialchars($v_update->getMarque());
	$vCouleur = htmlspecialchars($v_update->getCouleur());
	echo '
		<form method="post" action="index.php?action=updated">
			<fieldset>
				<legend>Mon formulaire :</legend>
				<p>
					<label for="immat_id">Immatriculation</label> :
					<input type="text" placeholder="Ex : 256AB34" value="'.$vImmatriculation.'" name="immatriculation" id="immat_id" required readonly/>
				</p>
				<p>
					<label for="marque_id">Marque</label>
					<input type="text" placeholder="Ex : Peujot" value="'.$vMarque.'" name="marque" id="marque_id" required/>
				</p>
				<p>
					<label for="couleur_id">Couleur</label>
					<input type="text" placeholder="Ex : Rouge" value="'.$vCouleur.'" name="couleur" id="couleur_id" required/>
				</p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset>
		</form>
	';
?>