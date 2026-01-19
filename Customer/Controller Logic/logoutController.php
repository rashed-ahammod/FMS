<?php
session_start();
session_unset();
session_destroy();

setcookie("remember_email", "", time() - 3600, "/");
setcookie("remember_role", "", time() - 3600, "/");

header("Location: ../View/Login.php");
exit();
