<?php 
include '../Controller Logic/logincontroller.php'; 
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Login Page</title>

<link rel="stylesheet" href="../Stylesheet/Login.css"></head>
<html>

<body>

<form method="POST" action="">
        <h1 style="text-align: center;">Sign in with your email</h1>
       
        Email:<br>
        <input type="email" id="email" name="email" placeholder="Please write your registered email" value="<?php echo $_COOKIE['remember_email'] ?? ''; ?>" >
        <?php echo $emailErr; ?>
    
        <br><br>
        
        Password:<br>
        <input type="password" id="password" name="password" required placeholder="Please write your password">
        <?php echo $passErr; ?>
        
        <div class="remember-box">
        <input type="checkbox" name="remember_me"
        <?php echo isset($_COOKIE['remember_email']) ? 'checked' : ''; ?>>
        <label>Remember Me</label>
    </div>

        <br>
        <button type="submit" name="Login_btn">Login</button>

        <div class="links">
            <a href="Registration.php">Not a user? Sign Up</a><br>
            <a href="">Forgot Password?</a><br>
    </form>
</body>