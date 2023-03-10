<?php
require_once("includes\config.php");
require_once("includes\classes\FormSanitizer.php");
require_once("includes\classes\Account.php");
require_once("includes\classes\Constants.php");

    $account = new Account($conn);

    if(isset($_POST["submitRegistration"])){
        
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);
       
        $success = $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);

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
                <h3>Sign Up</h3>
                <span>to continue to Vidio</span>
            </div>


            <form method="POST" action="">
                <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                <input type="text" name="firstName" placeholder="First name" value="<?php getInputValue("firstName")?>" required>

                <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                <input type="text" name="lastName" placeholder="Last name" value="<?php getInputValue("lastName")?>" required>

                <?php echo $account->getError(Constants::$usernameCharacters); ?>
                <?php echo $account->getError(Constants::$usernameTaken); ?>
                <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username")?>" required>

                <?php echo $account->getError(Constants::$emailsNotMatching); ?>
                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <?php echo $account->getError(Constants::$emailTaken); ?>
                <input type="email" name="email" placeholder="Email" value="<?php getInputValue("email")?>" required>
                <input type="email" name="email2" placeholder="Confirm email" value="<?php getInputValue("email2")?>" required>

                <?php echo $account->getError(Constants::$passwordsNotMatching); ?>
                <?php echo $account->getError(Constants::$passwordLength); ?>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password2" placeholder="Confirm password" required>
                <input type="submit" name="submitRegistration" value="Submit">
            </form>
            <a href="login.php" class="signInMessage">Already have an account? Log in here.</a>
        </div>
    </div>
</body>
</html>