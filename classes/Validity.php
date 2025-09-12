<?php

class Validity {
    public function passwordMatch($password, $confirm_password) {
        if ($password !== $confirm_password) {
            return false;
        } else {
            return true;
        }
    }

    public function hasEmptyInput(...$inputs) {
        foreach ($inputs as $input) {
            if (empty($input)) {
                return true;
            }
        }
        return false;
    }

    public function isValidEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }

    public function isValidUsername($username) {
        if (!preg_match(("/^[a-zA-Z0-9]*$/"), $username)) {
            return false;
        } else {
            return true;
        }
    }
}