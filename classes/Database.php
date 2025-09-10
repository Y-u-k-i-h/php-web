<?php

class Database {
    private $db_type;
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $db_port;

    private function __construct($db_type, $db_host, $db_user, $db_pass, $db_name, $db_port) {
        $this->db_type = $db_type;
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
        $this->db_port = $db_port;
    }

    private function db_connect() {
        $pdo = new PDO("pgsql:");
    }
}