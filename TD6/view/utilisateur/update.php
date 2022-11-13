<?php
	$uLogin = htmlspecialchars($u_form->getLogin());
	$uNom = htmlspecialchars($u_form->getNom());
	$uPrenom = htmlspecialchars($u_form->getPrenom());
	echo '
		<form method="post" action="index.php?controller='.$controller.'&action='.$champ_action.'">
			<fieldset>
				<legend>Mon formulaire :</legend>
				<p>
					<label for="login_id">Login</label> :
					<input type="text" placeholder="Choisissez un pseudo" value="'.$uLogin.'" name="login" id="login_id" required'.$readonly.'/>
				</p>
				<p>
					<label for="nom_id">Nom</label>
					<input type="text" placeholder="Entrez votre nom" value="'.$uNom.'" name="nom" id="nom_id" required/>
				</p>
				<p>
					<label for="prenom_id">Prenom</label>
					<input type="text" placeholder="Entrez votre prénom" value="'.$uPrenom.'" name="prenom" id="prenom_id" required/>
				</p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset>
		</form>
	';
?>