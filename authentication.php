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
    if (validate("username", "password")) {
        $credentials = getCredentials();
        $mysqliLink = mysqli_connect('localhost', 'Lenophie', 'root', 'tp_session');
        $matchedUserPassword = mysqli_query($mysqliLink, 'SELECT `password` FROM `users` WHERE `username` = "' . $credentials["username"] .'" LIMIT 1');
        $matchedUserPassword = mysqli_fetch_assoc($matchedUserPassword)["password"];

        if ($matchedUserPassword === NULL) return 'incorrect user';
        if (password_verify($credentials["password"], $matchedUserPassword)) return 'correct';
        return 'incorrect password';
    }
    return 'incomplete';
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

function getCredentials() {
    return [
        'username' => getUsername(),
        'password' => getPassword()
    ];
}