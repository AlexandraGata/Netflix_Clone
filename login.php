<?php
    if(isset($_POST["submitRegistration"])){
        echo "Form was submited!";
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
                <h3>Log In</h3>
                <span>to continue to Vidio</span>
            </div>


            <form method="POST" action="">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="submitRegistration" value="Submit">
            </form>
            <a href="register.php" class="signInMessage">Need an account? Sign up here.</a>
        </div>
    </div>
</body>
</html>