<?php
    session_start();
    include('authentication.php');
    if (checkCredentials()) {
        loginSession();
        header("Location:private.php");
        die();
    } else {
        header("Location:login.php?type=error&msg=Please fill in your credentials.");
        die();
    }
