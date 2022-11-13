<?php
	echo '<h4>Le trajet d'."'".'identifiant « '.$id.' » a bien été supprimé !</h4>';
	require (File::build_path(['view',$controller,'list.php']));
?>