<?php
require_once "Database.php";

class Aplikimi {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function registerApplication($name, $surname, $role, $description, $photo) {
        $sql = "INSERT INTO aplikimet (name, surname, role, description, photo) VALUES (:name, :surname, :role, :description, :photo)";
        $stmt = $this->conn->prepare($sql);
        
        return $stmt->execute([
            ':name' => $name,
            ':surname' => $surname,
            ':role' => $role,
            ':description' => $description,
            ':photo' => $photo
        ]);
    }

    public function getApplications() {
        $sql = "SELECT * FROM aplikimet";
        $stmt = $this->conn->query($sql);
        
        if ($stmt) {
            $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $applications = [];
        }
        
        return $applications;
    }
    
    
}
?>
