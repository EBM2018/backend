<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="Quentin Leuliet" />
        <link href="css/login.css" rel="stylesheet" />
        <title>TP_Session - Login</title>
    </head>
    <body>
        <h1>Login</h1>
        <hr>
        <?php
            if(isset($_GET["type"]) && isset($_GET["msg"])) {
                $type = $_GET["type"];
                $msg = $_GET["msg"];
                switch ($type) {
                    case "error":
                        echo "
                            <div class='msg-div'>
                                <span class='msg-span error-text'>" . $msg . "</span>
                            </div>";
                        break;
                    case "info":
                        echo "
                            <div class='msg-div'>
                                <span class='msg-span info-text'>" . $msg . "</span>
                            </div>";
                        break;
                }
            }
        ?>
        <div class="form-div">
            <form method="post" action="authenticationController.php">
                <label for="username-input">Username</label><br/>
                <input class="text-input" id="username-input" type="text" name="username" /><br/>
                <label for="password-input">Password</label><br/>
                <input class="text-input" id="password-input" type="password" name="password" /><br/>
                <input type="checkbox" id="new-user-checkbox" name="isNewUser" />
                <label for="new-user-checkbox">I am a new user.</label><br/>
                <button class="submit-button" type="submit">Login</button>
            </form>
        </div>
    </body>
</html>