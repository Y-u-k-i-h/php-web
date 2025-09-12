<?php

require_once __DIR__ . "/../../autoloader.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use config\Conf;

class Mail {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);

        try {

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}

