<?php
session_start();
include '../Model/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit();
}

$user_id = (int)$_SESSION['user_id'];
$success = $error = "";

$result = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $user_id");
$user = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {

    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $address  = trim($_POST['address'] ?? '');
    $phone    = trim($_POST['phone'] ?? '');

    if ($username === '' || $email === '' || $address === '' || $phone === '') {
        $error = "All fields are required!";
    } else {
        mysqli_query(
            $conn,
            "UPDATE user 
             SET Name='$username',
                 Email='$email',
                 Address='$address',
                 `Contact No`='$phone'
             WHERE user_id=$user_id"
        );

        $success = "Profile updated successfully!";
    }
}

if(isset($_POST['Dashboard'])){
    header("Location: CustomerDashboard.php");
    exit();
}

?>
