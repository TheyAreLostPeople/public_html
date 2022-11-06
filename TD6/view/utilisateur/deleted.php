<?php
	echo '<h4>L'."'".'utilisateur « '.$login.' » a bien été supprimée !</h4>';
	require (File::build_path(['view',$controller,'list.php']));
?>