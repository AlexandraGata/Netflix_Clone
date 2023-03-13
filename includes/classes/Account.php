<?php
require_once("includes\classes\Constants.php");

class Account{

    private $conn;
    private $errorArray = array();

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function register($fn, $ln, $un, $em, $em2, $pw, $pw2){
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUsername($un);
        $this->validateEmails($em, $em2);
        $this->validatePasswords($pw, $pw2);
    }

    private function validateFirstName($fn) {
        if(strlen($fn) < 2 || strlen($fn) > 30){
            array_push($this->errorArray, Constants::$firstNameCharacters);
        }
    }

    private function validateLastName($ln) {
        if(strlen($ln) < 2 || strlen($ln) > 30){
            array_push($this->errorArray, Constants::$lastNameCharacters);
        }
    }

    private function validateUsername($un) {
        if(strlen($un) < 2 || strlen($un) > 30){
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        $query = $this->conn->prepare("SELECT * FROM users WHERE username=:un");
        $query->bindValue(":un", $un);

        $query->execute();

        if($query->rowCount() != 0){
            array_push($this->errorArray, Constants::$usernameTaken);
        }
    }

    private function validateEmails($em, $em2){
        if ($em != $em2){
            array_push($this->errorArray, Constants::$passwordsNotMatching);
            return;
        }

        if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $query = $this->conn->prepare("SELECT * FROM users WHERE email=:em");
        $query->bindValue(":em", $em);

        $query->execute();

        if($query->rowCount() != 0){
            array_push($this->errorArray, Constants::$emailTaken);
        }
    }

    private function validatePasswords($pw, $pw2){
        if ($pw != $pw2){
            array_push($this->errorArray, Constants::$passwordsNotMatching);
            return;
        }

        if(strlen($pw) < 5 || strlen($pw) > 30){
            array_push($this->errorArray, Constants::$passwordLength);
        }

    }

    public function getError($error) {
        if(in_array($error, $this->errorArray)){
            return $error;
        }
    }

}


?>