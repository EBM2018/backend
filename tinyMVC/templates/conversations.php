<?php
// Ce fichier permet de tester les fonctions d�velopp�es dans le fichier malibforms.php

// Si la page est appel�e directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "conversations.php")
{
	header("Location:../index.php?view=conversations");
	die("");
}

include_once("libs/modele.php"); // listes
include_once("libs/maLibUtils.php");// tprint
include_once("libs/maLibForms.php");// mkTable, mkLiens, mkSelect ...



?>

<h1>Conversations du site</h1>

<h2>Liste des conversations actives</h2>

<?php
$conversations = listerConversations("actives");
mkTable($conversations, array("theme","id"));

// Comment n'afficher que id & th�mes ?
// A remplacer par mkLiens
?>

<h2>Liste des conversations inactives</h2>

<?php
$conversations = listerConversations("inactives");
mkTable($conversations, array("theme","id")); 
// A remplacer par mkLiens
?>

<hr />
<h2>Gestion des conversations</h2>

<?php

$conversations = listerConversations(); // toutes
// TODO: fabriquer un formulaire pour activer/archiver les conversations 
// Utiliser les fonctions mkForm, mkSelect, mkInput... de la librairie maLibForms 
//mkTable($conversations); // A remplacer par mkSelect

$lastIdConv = valider("idConv");
mkForm("controleur.php");
mkSelect("idConv",$conversations, "id","theme",$lastIdConv);
mkInput("submit","action","Activer");
mkInput("submit","action","Archiver");
mkInput("submit","action","Supprimer");
endForm();

mkForm("controleur.php");
mkInput("text","theme","Th�me ?");
mkInput("hidden","action","creerConv");
mkInput("submit","","Cr�er Conversation");
endForm();

//TODO : d�velopper le controleur; v�rifier que tout fonctionne 
?>















