<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["signup"])) {
        try {
            // Grab the data from the form
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];

            // Create an instance of the SignupController
            require_once __DIR__ . "/../autoloader.php";
            $signup = new controllers\SignupController($fname, $lname, $username, $email, $password, $confirm_password);
            $validity = new Validity();

            // Error handlers
            if ($validity->passwordMatch($password, $confirm_password) == false) {
                header("location: /index.php?error=passwordsdontmatch");
                exit();
            }

            if ($validity->hasEmptyInput($fname, $lname, $username, $email, $password, $confirm_password)) {
                header("location: /index.php?error=emptyinput");
                exit();
            }

            if ($validity->isValidEmail($email) == false) {
                header("location: /index.php?error=invalidemail");
                exit();
            }

            if ($validity->isValidUsername($username) == false) {
                header("location: /index.php?error=invalidusername");
                exit();
            }

            if ($signup->checkUser() == false) {
                header("location: /index.php?error=useroremailtaken");
                exit();
            }

            $signup->signUpUser();
            header("location: /public/views/auth/login.php");
            exit();
        } catch (Exception $e) {
            // Log the error
            error_log("Signup error: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
            exit();
        }
    }
}
