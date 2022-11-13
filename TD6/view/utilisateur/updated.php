<?php
	echo '<h4>L'."'".'utilisateur de login « '.$login.' » a bien été mise à jour !</h4>';
	require (File::build_path(['view',$controller,'list.php']));
?>