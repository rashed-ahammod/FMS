<?php
session_start();

/* 🧹 Clear all session data */
$_SESSION = [];
session_destroy();

/* 🍪 Destroy Remember Me cookies */
if (isset($_COOKIE['remember_email'])) {
    setcookie("remember_email", "", time() - 3600, "/");
}

if (isset($_COOKIE['remember_role'])) {
    setcookie("remember_role", "", time() - 3600, "/");
}

/* 🔁 Redirect to login */
header("Location: ../View/Login.php");
exit();
?>
