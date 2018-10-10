<?php

session_start();
session_destroy(); 
// il faut avoir appelée avant session_start

header("Location:connexion.php?message=". urlencode("Merci, au revoir ! ")); 
?>
