<?php
// PROFIL.PHP
session_start();

include("maLibUtils.php"); 

if ($pseudo = valider("pseudo","SESSION")){
	// 	afficher le pseudo de l'utilisateur 
	echo "<h1>Bienvenue $pseudo</h1>"; 

} 
else {
	// 	rediriger vers la page connexion.php
	header("Location:connexion.php?message=". urlencode("Il faut vous connecter avant de vous rendre sur la page de profil !"));
}

?>


<a href="logout.php">Se déconnecter</a>
