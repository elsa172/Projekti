<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'eventopia'; 
    private $username = 'root';  
    private $password = '';      
    private $conn;

    public function __construct() {
        try {
            // Krijo një lidhje PDO me databazën
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, 
            $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
