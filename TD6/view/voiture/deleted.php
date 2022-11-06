<?php
	echo '<h4>La voiture d'."'".'immatriculation « '.$immat.' » a bien été supprimée !</h4>';
	require (File::build_path(['view',$controller,'list.php']));
?>