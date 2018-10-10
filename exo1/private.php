<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location:login.php?type=error&msg=You are not logged in.");
    die();
}
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="author" content="Quentin Leuliet" />
            <link href="css/private.css" rel="stylesheet" />
            <title>TP_Session - Private page</title>
        </head>
    <body>
        <h1>Hello "<?php echo $_SESSION["user"] ?>" !</h1>
        <div class="disconnect-div">
            <form action="logout.php">
                <button class="disconnect-button" type="submit">Disconnect</button>
            </form>
        </div>
    </body>
</html>

