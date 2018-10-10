<?php session_start();
    if (isset($_SESSION['login'])){
        header("Location: index.php"); // Redirecting To Home Page
        exit;
    }
    else{
        echo '<form method="POST" action="index.php">'.
        'Login:<br>'.
        '<input type="text" name="login"><br>'.
        'Mot de passe:<br>'.
        '<input type="password" name="mdp"><br><br>'.
        '<input type="submit" value="Identification">'.
        '</form>';
    }
?>
<html>
	<head>
		<title>Page d'identification</title>
		<meta charset="UTF-8">
	</head>
	<body>
	</body>
</html>

			