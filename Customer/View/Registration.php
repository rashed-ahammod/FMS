<!DOCTYPE html>

<html>
<head>
    
    <title>Registration Page</title>
    <link rel="stylesheet" href="../Stylesheet/Registration.css">
    
</head>
<body>
    <h1><center>Register Form</center></h1>
    <form action="../Controller Logic/registrationcontroller.php" method="post">

        <label for="name">Username:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="contactno">Contact No:</label><br>
        <input type="text" id="contactno" name="contactno" required><br><br>

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" required><br><br>
       

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirmpassword">Confirm Password:</label><br>
        <input type="password" id="confirmpassword" name="confirmpassword" required><br><br>

        <input type="hidden" name="accounttype" value="customer">

        </select><br><br>
    
        <button type="submit">Register</button>

    </form>

</body>
</html>