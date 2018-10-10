<?php
// CONNEXION.PHP

// on affiche un éventuel message 
include("maLibUtils.php"); 

if ($message = valider("message")) {
	echo "<h2>$message</h2>"; 
}
?>

<form action="ouvrir_session.php" method="GET">
Entrez votre pseudo : 
<input type="text" name="pseudo"/>
<input type="password" name="passe"/>
<input type="submit" value="OK" />
</form>
