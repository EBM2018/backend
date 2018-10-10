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
    return validate("username", "password");
}

function loginSession() {
    $_SESSION["user"] = $_POST["username"];
}

function getUsername() {
    return $_POST["username"];
}