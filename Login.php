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
        width 300px;
        margin: auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
<body>
    <h1>Login</h1>

    <form onsubmit="return handlesubmit()">
        Username:<br>
        <input type="text" id="username" name="username" required><br><br>
        Password:<br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>