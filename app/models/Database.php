<?php
class Database {
    private $conn;
    
    public function __construct($dbname) {
        $this->connect($dbname);
    }

    private function connect($dbname) {
        $host = "localhost";
        $user = "root"; // Change if needed
        $pass = ""; // Change if needed
        
        $this->conn = new mysqli($host, $user, $pass, $dbname);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>
