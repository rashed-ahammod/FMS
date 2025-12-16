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
        margin: auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        
    }

    input
    {
        width: 95%;
        padding: 10px;
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    
    button
    {
        padding: 12px;
        width: 100%;
    }
    
</style>
<body>
    <center>
    <h1>Login</h1>
    </center>

    <form onsubmit="return handlesubmit()">
        <h1 style="text-align: center;">Sign in with your email</h1>
        Email:<br>
        <input type="email" id="email" name="email" required><br><br>
        Password:<br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>