<?php

class SignupController {
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

}
