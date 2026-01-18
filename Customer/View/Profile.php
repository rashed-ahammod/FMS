<?php include '../Controller Logic/ProfileController.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="../Stylesheet/Profile.css">
</head>
<body>

<div class="profile-container">

    <h2>My Profile</h2>

    <form method="post" class="profile-form">
        <label>Username</label>
        <input type="text" name="username"
               value="<?php echo htmlspecialchars($user['Name']); ?>">

        <label>Email</label>
        <input type="email" name="email"
               value="<?php echo htmlspecialchars($user['Email']); ?>">

        <label>Address</label>
        <input type="text" name="address"
               value="<?php echo htmlspecialchars($user['Address']); ?>">

        <label>Phone</label>
        <input type="text" name="phone"
               value="<?php echo htmlspecialchars($user['Contact No']); ?>">

        <button type="submit" name="update" class="btn update">
            Update Profile
        </button>

        <button type="submit" name="Dashboard" class="btn dashboard">
            Back to Dashboard
        </button>
    </form>

    <p class="success"><?php echo $success; ?></p>
    <p class="error"><?php echo $error; ?></p>



</div>

</body>
</html>
