<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        try {
            $username = $_POST["username"];
            $password = $_POST["password"];

            require_once __DIR__ . "/../autoloader.php";
            $loginController = new controllers\LoginController($username, $password);
            $validity = new Validity();

            if ($validity->hasEmptyInput($username, $password)) {
                header("location: /index.php?error=emptyinput");
                exit();
            }

            
        } catch (Exception $e) {
            // Log the error
            error_log("Login error: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
            exit();
        }
    }
}