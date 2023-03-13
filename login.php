<?php
    require_once("includes\config.php");
    require_once("includes\classes\FormSanitizer.php");
    require_once("includes\classes\Account.php");
    require_once("includes\classes\Constants.php");

    $account = new Account($conn);

    if(isset($_POST["submitRegistration"])){
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        
       
        $success = $account->login($username, $password);

        if($success){
            $_SESSION["userLoggedIn"] = $username;
            header("Location: index.php");
        }
    }

    function getInputValue($name){
        if (isset($_POST[$name])){
            echo $_POST[$name];
        }
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
                <?php echo $account->getError(Constants::$loginFailed); ?>
                <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username")?>" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="submitRegistration" value="Submit">
            </form>
            <a href="register.php" class="signInMessage">Need an account? Sign up here.</a>
        </div>
    </div>
</body>
</html>