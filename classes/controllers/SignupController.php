<?php

namespace controllers;

require_once "../../autoloader.php";

use Database;

class SignupController extends Database{
    private $fname;
    private $lname;
    private $username;
    private $email;
    private $password;
    private $confirm_password;

    public function __construct($fname, $lname, $username, $email, $password, $confirm_password) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
    }

    protected function signup() {
        
    }

    protected function validateInput() {
        // Password match check
        if ($this->password !== $this->confirm_password) {
            echo "<script>alert('Passwords do not match.'); window.location.href = 'public/views/signup.php';</script>";
            return false;
        }

        // Empty field check
        if (empty($this->fname) || empty($this->lname) || empty($this->username) || empty($this->email) || empty($this->password) || empty($this->confirm_password)) {
            echo "<script>alert('All fields are required.'); window.location.href = 'public/views/signup.php';</script>";
            return false;
        }

        
    }
}
