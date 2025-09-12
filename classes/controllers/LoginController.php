<?php

namespace controllers;

use Database;

class LoginController extends Database {
    private $usernameOrEmail;
    private $password;

    public function __construct ($usernameOrEmail, $password) {
        parent::__construct(DB_TYPE, DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

        $this->usernameOrEmail = $usernameOrEmail;
        $this->password = $password;
    }

    public function getUser() {
        $stmt = $this->connect()->prepare("SELECT password FROM users WHERE uname = ? OR email = ?");

        if (!$stmt->execute(array($this->usernameOrEmail, $this->usernameOrEmail))) {
            $stmt = null;
            header("location: /index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: /index.php?error=usernotfound");
            exit();
        }

        $passwordHashed = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $checkPassword = password_verify($this->password, $passwordHashed[0]["password"]);

        if ($checkPassword == false) {
            $stmt = null;
            header("location: /index.php?error=wrongpassword");
            exit();
        } else if ($checkPassword == true) {
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE uname = ? OR email = ? AND password = ?");
            
            if (!$stmt->execute(array($this->usernameOrEmail, $this->usernameOrEmail, $this->password))) {
                $stmt = null;
                header("location: /index.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: /index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetch(\PDO::FETCH_ASSOC);
            


        }

       $stmt = null;

    }
}
