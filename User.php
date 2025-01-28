<?php
class User {
    private $conn;
    private $table = "user"; // Emri i tabelës në bazën e të dhënave

    public function __construct($db) {
        // Krijo lidhjen me bazën e të dhënave
        $this->conn = $db;
    }

    // Metoda për regjistrimin e përdoruesve
    public function signUp($username, $email, $password) {
        // Kontrollo nëse emaili ekziston tashmë
        if ($this->emailExists($email)) {
            return false; // Emaili tashmë ekziston
        }

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

    // Funksion për të kontrolluar nëse emaili ekziston
    private function emailExists($email) {
        $query = "SELECT id FROM " . $this->table . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);

        // Lidh parametrin e emailit
        $stmt->bindParam(':email', $email);

        // Ekzekuto dhe kontrollo nëse emaili ekziston
        $stmt->execute();

        // Nëse ka një rresht që kthehet, do të thotë që emaili ekziston
        if ($stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }
}
?>
