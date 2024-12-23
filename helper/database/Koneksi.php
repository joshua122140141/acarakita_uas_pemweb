<?php

class Koneksi {
    private $connection;

    private $host = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $database = "acarakita";

    public function __construct() {
        $this->host = "127.0.0.1";
        $this->database = "acarakita";
        $this->username = "acarakita123";
        $this->password = "acarakita123";
        
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