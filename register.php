<?php
    if(isset($_POST["submitRegistration"])){
        $firstName = $_POST["firstName"];
        
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="assets\style\style.css"/>
</head>
<body>
    <div class="signInContainer">
        <div class="column">
            <div class="header">
                <img src="assets\images\logo2-nobg.png" title="Logo" alt="Site logo"/>
                <h3>Sign Up</h3>
                <span>to continue to Vidio</span>
            </div>


            <form method="POST" action="">
                <input type="text" name="firstName" placeholder="First name" required>
                <input type="text" name="lastName" placeholder="Last name" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="email" name="email2" placeholder="Confirm email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password2" placeholder="Confirm password" required>
                <input type="submit" name="submitRegistration" value="Submit">
            </form>
            <a href="login.php" class="signInMessage">Already have an account? Log in here.</a>
        </div>
    </div>
</body>
</html>