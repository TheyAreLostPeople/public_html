<?php
	require_once "Voiture.php";
	Voiture::getAllVoitures();
	require_once "utilisateur.php";
	Utilisateur::getAllUtilisateurs();
	require_once "Trajet.php";
	Trajet::getAllTrajets();
?>