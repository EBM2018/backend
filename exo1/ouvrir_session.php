<?php
// OUVRIR_SESSION.PHP
session_start();

$comptes = array("tom"=>"ebm");

include("maLibUtils.php");

if ( ($pseudo = valider("pseudo")) && ($passe = valider("passe")) ) {
	// Si on entre dans ce bloc, la variable $pseudo 
	// contient l'information passée en paramètre

	if  (isset($comptes[$pseudo])){
		if ($comptes[$pseudo] == $passe) {
			$_SESSION["pseudo"] = $pseudo; 	
			header("Location:profil.php");
		} else {
			header("Location:connexion.php?message=" . urlencode("Passe incorrect"));
		}
	} else {
		header("Location:connexion.php?message=" . urlencode("Pseudo inconnu"));
	}
} else {
	header("Location:connexion.php?message=" . urlencode("Pseudo ou passe absent"));
}




?>
