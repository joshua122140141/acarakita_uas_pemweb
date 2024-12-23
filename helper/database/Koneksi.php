<?php

class Koneksi {
    private $connection;

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "acarakita";

    public function __construct() {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "acarakita";
        
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function createConnection() {
        return new mysqli($this->host, $this->username, $this->password, $this->database);
    }

    public function getConnection() {
        if (!$this->connection) {
            $this->connection = $this->createConnection();
        }

        return $this->connection;
    }
}