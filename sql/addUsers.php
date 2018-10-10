<?php

$mysqliLink = mysqli_connect('localhost', 'Lenophie', 'root', 'tp_session');
$matchedUserPassword = mysqli_query($mysqliLink, 'INSERT INTO `users` (`username`, `password`) VALUES ("Quentin Leuliet", "' . password_hash('root', PASSWORD_BCRYPT) . '")');
