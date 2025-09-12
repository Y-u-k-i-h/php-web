<?php

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// Database configuration
define ("DB_TYPE", $_ENV['DB_TYPE']);
define ("DB_HOST", $_ENV['DB_HOST']);
define ("DB_USER", $_ENV['DB_USER']);
define ("DB_PASS", $_ENV['DB_PASS']);
define ("DB_NAME", $_ENV['DB_NAME']);
define ("DB_PORT", $_ENV['DB_PORT']);

// PHP Mailer configuration
define ("SMTP_HOST", $_ENV['SMTP_HOST']);
define ("SMTP_USER", $_ENV['SMTP_USER']);
define ("SMTP_PASS", $_ENV['SMTP_PASS']);
define ("SMTP_PORT", $_ENV['SMTP_PORT']);
define ("SMTP_SECURE", $_ENV['SMTP_SECURE']);

// Site Configuration
$conf["site_timezone"] = "Africa/Nairobi";
$conf["site_url"] = "http://localhost/simplewebphp/public";
$conf["site_name"] = "SimpleWebPHP";
$conf["site_language"] = "en";
