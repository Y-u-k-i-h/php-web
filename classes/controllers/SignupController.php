<?php

namespace controllers;

use Database;

class SignupController extends Database{
    private $fname;
    private $lname;
    private $username;
    private $email;
    private $password;
    private $confirm_password;

    public function __construct($fname, $lname, $username, $email, $password, $confirm_password) {
        parent::__construct(DB_TYPE, DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

        $this->fname = $fname;
        $this->lname = $lname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
    }

    public function signUpUser() {
        $stmt = $this->connect()->prepare("INSERT INTO users (fname, lname, uname, email, password) VALUES (?, ?, ?, ?, ?)");

        // Password hashing
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($this->fname, $this->lname, $this->username, $this->email, $hashedPassword))) {
            $stmt = null;
            header("location: /index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    public function checkUser() {
        $stmt = $this->connect()->prepare("SELECT EXISTS(SELECT * FROM users WHERE uname = ? OR email = ?)");

        // Check if statement preparation was successful
        if (!$stmt->execute(array($this->username, $this->email))) {
            $stmt = null;
            header("location: /index.php?error=stmtfailed");
            exit();
        }

        $canProceed = null;
        if (!$stmt) {
            $canProceed = false;
        } else {
            $canProceed = true;
            $stmt = null;
        }

        return $canProceed;
    }
}
