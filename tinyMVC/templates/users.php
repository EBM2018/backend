<?php
// Ce fichier permet de tester les fonctions développées dans le fichier bdd.php (première partie)

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "users.php")
{
	header("Location:../index.php?view=users");
	die("");
}

include_once("libs/modele.php");
include_once("libs/maLibUtils.php"); // tprint

?>

<h1>Administration du site</h1>

<h2>Liste des utilisateurs de la base </h2>

<?php

echo "liste des utilisateurs autorises de la base :"; 
$users = listerUtilisateurs("nbl");
tprint($users);	// préférer un appel à mkTable($users);

echo "<hr />";
echo "liste des utilisateurs non autorises de la base :"; 
$users = listerUtilisateurs("bl");
tprint($users);	// préférer un appel à mkTable($users);

?>
<hr />
<h2>Changement de statut des utilisateurs</h2>

<form action="controleur.php">

<select name="idUser">
<?php
$users = listerUtilisateurs();

// 3.2 : on récupère l'id du dernier utilisateur manipulé 
$lastIdUser = valider("idUser");

// préférer un appel à mkSelect("idUser",$users, ...)
foreach ($users as $dataUser)
{
	// faut-il préselectionner ? 
	// on utilise un attribut "selected" si nécessaire 
	if ( $dataUser["id"] == $lastIdUser)
		$sel = "selected";
	else $sel =""; 

	echo "<option $sel value=\"$dataUser[id]\">\n";
	echo  $dataUser["pseudo"];
	// echo  " (" . $dataUser["blacklist"] . ")";
	// echo  " ($dataUser[blacklist])";
/*
& esperluète - ampersand 
- tiret - dash 
# dièse - hash 
#! hashbang
_ underscore 
| pipe 
/ slash 
\ antislash - backslash 
{ accolade - brace 
" guillemet - double quote - autorise l'interprétation
' apostrophe - tick == quote - banalise tous les caractères 
` backquote - `cmd` <=> $(cmd) en shell 
		en js `${variable}`
		en SQL `noms des champs ou tables `
		très utile pour les mots-réservés 
	Ex : SELECT date, contenu FROM messages 
		provoque une erreur 
		car date est le nom d'une fonction SQL!!
	Solution : SELECT `date`, contenu FROM messages 

*/


	//if ($dataUser["blacklist"]) echo " (bl)"; 
	//else echo " (nbl)";

	echo $dataUser["blacklist"] ? " (bl)" : " (nbl)"; 

	echo "\n</option>\n"; 
}
?>
</select>

<input type="submit" name="action" value="Interdire" />
<input type="submit" name="action" value="Autoriser" />
</form>






