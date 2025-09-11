<?php

class Database {
    private $db_type;
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $db_port;

    public function __construct($db_type, $db_host, $db_user, $db_pass, $db_name, $db_port) {
        $this->db_type = $db_type;
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
        $this->db_port = $db_port;

        
    }

    protected function connect() {
        $dbData = "$this->db_type:host=$this->db_host;port=$this->db_port;dbname=$this->db_name";

        try {
            $db = new PDO($dbData, $this->db_user, $this->db_pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            return $db;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
            die();
        }
    }

    
}
