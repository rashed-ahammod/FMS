<?php

session_start();

include '../Model/db.php';

$email = $password = "";
$emailErr = $passErr = "";
$loginSuccess = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate email
    if (empty($_POST["email"])) 
    {
        $emailErr = "Email is required";
    } 
    else 
    {
        $email = trim($_POST["email"]);
    }
    // Validate password
    if (empty($_POST["password"])) 
    {
        $passErr = "Password is required";
    } 
    else 
    {
        $password = trim($_POST["password"]);
    }
    // Check database
    if (empty($emailErr) && empty($passErr))
    {
        
        if ($email === 'admin' && $password === '123') {

        $_SESSION['admin'] = true;

        echo "<script>
            alert('Kitchen Staff Login Successful');
            window.location.href = '../Kitchen Staff/View/dashboard.php';
        </script>";
        exit();
    }
    
        $safe_email = mysqli_real_escape_string($conn, $email);
        $safe_password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM user WHERE email='$safe_email' AND password='$safe_password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['accountType'] = 'customer';
            $_SESSION['cart'] = [];

            echo"<script>
            alert('Login Successful');
            window.location.href = 'CustomerDashboard.php';           
            </script>";
            $loginSuccess = true;
        } 
        else 
        {
            echo"<script>alert('Invalid email or password');</script>";
        }
        
    }
}
?>