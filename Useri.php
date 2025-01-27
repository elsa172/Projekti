<?php
class User {
    private $conn;
    private $table_name = 'useri';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($username, $password, $role = 'user') {
        $query = "INSERT INTO {$this->table_name} (username, password, role) VALUES (:username, :password, :role)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', htmlspecialchars(strip_tags($username)));
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
        $stmt->bindParam(':role', htmlspecialchars(strip_tags($role)));

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Kyçja e përdoruesve
    public function login($username, $password) {
        $query = "SELECT id, username, password, role FROM {$this->table_name} WHERE username = :username LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', htmlspecialchars(strip_tags($username)));
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                return true;
            }
        }
        return false;
    }
}

?>