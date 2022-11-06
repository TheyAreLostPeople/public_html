<?php
	echo '<h4>La voiture d'."'".'immatriculation « '.$immat.' » a bien été mise à jour !</h4>';
	require (File::build_path(['view',$controller,'list.php']));
?>