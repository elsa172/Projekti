<?php
class User {
    private $conn;
    private $table_name = 'useri';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Kontrollo nëse emaili ekziston
    public function emailExists($email) {
        $query = "SELECT id FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', htmlspecialchars(strip_tags($email)));
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    // Regjistrimi i përdoruesit
    public function register($username, $email, $password) {
        if ($this->emailExists($email)) {
            return "Email-i ekziston!";
        }

        $role = (strpos($email, '@admin.com') !== false) ? 'admin' : 'user';

        $query = "INSERT INTO " . $this->table_name . " (username, email, password, role) 
                  VALUES (:username, :email, :password, :role)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', htmlspecialchars(strip_tags($username)));
        $stmt->bindParam(':email', htmlspecialchars(strip_tags($email)));
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
        $stmt->bindParam(':role', $role);

        return $stmt->execute() ? "Regjistrimi u krye me sukses!" : "Gabim gjatë regjistrimit!";
    }

    // Kyçja e përdoruesit
    public function login($username, $password) {
        $query = "SELECT id, username, password, role FROM " . $this->table_name . " WHERE username = :username";
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
