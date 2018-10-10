<?php
session_start();
session_destroy();
header("Location:login.php?type=info&msg=You were logged out");
die();