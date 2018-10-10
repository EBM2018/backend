<?php

function validate () {
    $args = func_get_args();
    $arePostParamsFilledIn = true;
    foreach ($args as $arg) {
        if (!isset($_POST[$arg]) || $_POST[$arg] === "") {
            $arePostParamsFilledIn = false;
            break;
        }
    }
    return $arePostParamsFilledIn;
}

function checkCredentials() {
    if (!validate("isNewUser")) {
        if (validate("username", "password")) {
            $credentials = getCredentials();
            $mysqliLink = mysqli_connect('localhost', 'Lenophie', 'root', 'tp_session');
            $matchedUserPassword = mysqli_query($mysqliLink, 'SELECT `password` FROM `users` WHERE `username` = "' . $credentials["username"] . '" LIMIT 1');
            $matchedUserPassword = mysqli_fetch_assoc($matchedUserPassword)["password"];

            if ($matchedUserPassword === NULL) return 'incorrect user';
            if (password_verify($credentials["password"], $matchedUserPassword)) return 'correct';
            return 'incorrect password';
        }
        return 'incomplete';
    } else if (validateNewUserParam()) {
        if (validate("username", "password")) {
            $credentials = getCredentials();
            $mysqliLink = mysqli_connect('localhost', 'Lenophie', 'root', 'tp_session');
            $numberDuplicateUsers = mysqli_query($mysqliLink, 'SELECT COUNT(*) AS `count` FROM `users` WHERE `username` = "' . $credentials["username"] . '"');
            $numberDuplicateUsers = mysqli_fetch_assoc($numberDuplicateUsers)["count"];
            if ((int) $numberDuplicateUsers > 0) return 'duplicate user';
            else {
                addUser($credentials);
                return 'correct';
            }
        }
    }
}

function loginSession() {
    $_SESSION["user"] = $_POST["username"];
}

function getUsername() {
    return $_POST["username"];
}

function getPassword() {
    return $_POST["password"];
}

function validateNewUserParam() {
    return $_POST["isNewUser"] === 'on';
}

function getCredentials() {
    return [
        'username' => getUsername(),
        'password' => getPassword()
    ];
}

function addUser($credentials) {
    $mysqliLink = mysqli_connect('localhost', 'Lenophie', 'root', 'tp_session');
    mysqli_query($mysqliLink, 'INSERT INTO `users` (`username`, `password`) VALUES ("' . $credentials['username'] . '", "' . password_hash($credentials['password'], PASSWORD_BCRYPT) . '")');
}