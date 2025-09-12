<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Simple Web PHP</title>
    </head>

    <body>
        <h1>Hello and Welcome</h1>
        <p>Do you want to Signup or Login</p>
        <form method="post">
            <input type="submit" value="Signup" name="signupi" />
            <input type="submit" value="Login" name="logini" />
        </form>
    </body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["signupi"])) {
            header("location: public/views/auth/signup.php");
            exit();
        }

        if(isset($_POST["logini"])) {
            header("location: public/views/auth/login.php");
            exit();
        }
    }