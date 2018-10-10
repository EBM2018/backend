<?php
    session_start();
    include('authentication.php');
    $resultCheckCredentials = checkCredentials();
    if ($resultCheckCredentials === 'correct') {
        loginSession();
        header("Location:private.php");
        die();
    } else if ($resultCheckCredentials === 'incorrect user') {
        header("Location:login.php?type=error&msg=The user doesn't exist.");
        die();
    } else if ($resultCheckCredentials === 'incorrect password') {
        header("Location:login.php?type=error&msg=The password is incorrect.");
        die();
    } else if ($resultCheckCredentials === 'incomplete') {
        header("Location:login.php?type=error&msg=Please fill in your credentials.");
        die();
    }
