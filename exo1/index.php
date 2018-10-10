<?php session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Hello, it's me</title>
		<meta charset="UTF-8">
	</head>
	<body>
	<?php
if (isset($_POST['login']) && isset($_POST['mdp'])) { //verif que variables existent

    $log = $_POST['login']; //récupération des valeurs des champs:
		$mdp = $_POST['mdp']; // récupération du mot de passe
		$users = array(
			array('login' =>'Nans', 'mdp' => 'a'),
			array('login' =>'a', 'mdp' => 'a')
		);
		$found = in_array(array('login' =>$log, 'mdp' => $mdp), $users);
    if ($found) {

        $_SESSION['login'] = $log;
        $_SESSION['pwd'] = $mdp;
				echo "</br>Bonjour " . $_SESSION['login'] . "!!</br>";
				echo "<a href='drop_session.php'> Log Out </a>";
		} 
		else {
			echo "Problème d'authentification";
		}
} elseif (isset($_SESSION['login'])) {
		echo "</br>Bonjour " . $_SESSION['login'] . "!</br>";
		echo "<a href='drop_session.php'> Log Out </a>";

} else {
    echo "<a href='identification.php'>Veuillez vous authentifier en cliquant sur ce lien</a>";
}

?>


	</body>
</html>