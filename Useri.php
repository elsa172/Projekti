<?php
class User {
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function signUp($username, $email, $password) {
        // Përcakto rolin bazuar në email
        $role = (strpos($email, '@admin.com') !== false) ? 'admin' : 'user';

        // Fjalëkalimi i koduar (hashed)
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Query për të futur të dhënat në tabelën users
        $query = "INSERT INTO " . $this->table . " (username, email, password, role) VALUES (:username, :email, :password, :role)";
        $stmt = $this->conn->prepare($query);

        // Lidh parametrat me vlerat përkatëse
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':role', $role);

        // Ekzekuto query-n dhe kthe rezultatin
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>

