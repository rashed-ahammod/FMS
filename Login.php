<!DOCTYPE HTML>
<html>
<head>
    <title>Login Page</title>
</head>
<style>
    body
    {
        font-family: Arial, sans-serif;
        padding: 30px;
        background-color: #f0f8ff;
    }

    form
    {
        background-color: #ffffff;
        padding:20px;
        border-radius: 10px;
        width: 500px;
        height: 500px;
        margin: 200px auto 0 auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        
    }

    input
    {
        width: 95%;
        padding: 10px;
        margin-top: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    
    button
    {
        padding: 12px;
        width: 100%;
    }

    .links
    {
        text-align: center;
        margin-top: 20px;
    }

    
</style>
<body>

    <form onsubmit="return handlesubmit()">
        <h1 style="text-align: center;">Sign in with your email</h1>
        Email:<br>
        <input type="email" id="email" name="email" required placeholder="Please write your registered email"><br><br>
        Password:<br>
        <input type="password" id="password" name="password" required placeholder="Please write your password"><br><br><br><br>
        <button type="submit">Login</button>

        <div class="links">
            <a href="">Not a user? Sign Up</a><br>
            <a href="">Forgot Password?</a><br>
    </form>