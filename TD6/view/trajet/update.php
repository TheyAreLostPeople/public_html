<?php
	$tId = htmlspecialchars($t_form->get('id'));
	$tDepart = htmlspecialchars($t_form->get('depart'));
	$tArrivee = htmlspecialchars($t_form->get('arrivee'));
	$tDate = htmlspecialchars($t_form->get('date'));
	$tNbplaces = htmlspecialchars($t_form->get('nbplaces'));
	$tPrix = htmlspecialchars($t_form->get('prix'));
	$tConducteurLogin = htmlspecialchars($t_form->get('conducteur_login'));
	echo '
		<form method="post" action="index.php?controller='.$controller.'&action='.$champ_action.'">
			<fieldset>
				<legend>Mon formulaire :</legend>
				<p>
					<label for="id_id">Identifiant</label> :
					<input type="number" placeholder="Choisissez un identifiant pour ce trajet" value="'.$tId.'" name="id" id="id_id" required'.$readonly.'/>
				</p>
				<p>
					<label for="depart_id">Lieu de depart</label>
					<input type="text" placeholder="Entrez le nom du lieu de départ" value="'.$tDepart.'" name="depart" id="depart_id" required/>
				</p>
				<p>
					<label for="arrivee_id">Lieu d'."'".'Arrivée</label>
					<input type="text" placeholder="Entrez le nom du lieu d'."'".'arrivée" value="'.$tArrivee.'" name="arrivee" id="arrivee_id" required/>
				</p>
				<p>
					<label for="date_id">Date</label>
					<input type="date" placeholder="Entrez la date du trajet" value="'.$tDate.'" name="date" id="date_id" required/>
				</p>
				<p>
					<label for="nbplaces_id">Nombre de places</label>
					<input type="number" min="1" placeholder="Entrez le nombre de places disponibles pour ce trajet" value="'.$tNbplaces.'" name="nbplaces" id="nbplaces_id" required/>
				</p>
				<p>
					<label for="prix_id">Prix</label>
					<input type="number" min="1" placeholder="Entrez le prix de ce trajet" value="'.$tPrix.'" name="prix" id="prix_id" required/>€
				</p>
				<p>
					<label for="conducteur_login_id">Login du conducteur</label>
					<input type="text" placeholder="Entrez le login du conducteur" value="'.$tConducteurLogin.'" name="conducteur_login" id="conducteur_login_id" required/>
				</p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset>
		</form>
	';
?>