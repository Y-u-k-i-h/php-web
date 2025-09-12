<?php

namespace services;

require_once __DIR__ . "/../../autoloader.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use config\Conf;

class Mail {
    private $mail;
    private $recipient;

    public function __construct($recipient) {
        $this->mail = new PHPMailer(true);
        $this->recipient = $recipient;

        try {

            // Server settings
            $this->mail->isSMTP();
            $this->mail->Host = SMTP_HOST;
            $this->mail->SMTPAuth = true;
            $this->mail->Username = SMTP_USER;
            $this->mail->Password = SMTP_PASS;
            $this->mail->SMTPSecure = SMTP_SECURE;
            $this->mail->Port = SMTP_PORT;

            // Recipients
            $this->mail->setFrom(SMTP_USER, 'SimpleWebPHPy');
            $this->mail->addAddress($this->recipient);

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    public function sendMail($subject, $body) {
        // Content
        $this->mail->Subject = $subject;
        $this->mail->Body    = $body;
        $this->mail->isHTML(true);

        $this->mail->send();
    }
}

