<?php
require_once "Database.php";

class Review {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    
    public function addReview($name, $email, $review, $photo = null) {
        $sql = "INSERT INTO reviews (name, email, review, photo) VALUES (:name, :email, :review, :photo)";
        $stmt = $this->conn->prepare($sql);
        
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':review' => $review,
            ':photo' => $photo
        ]);
    }

    public function getReviews() {
        $sql = "SELECT * FROM reviews";
        $stmt = $this->conn->query($sql);
        
        if ($stmt) {
            $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $reviews = [];
        }
        
        return $reviews;
    }

    public function deleteReview($id) {
        $sql = "DELETE FROM reviews WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        
        return $stmt->execute([':id' => $id]);
    }


    public function updateReview($id, $name, $email, $review, $photo = null) {
        $sql = "UPDATE reviews SET name = :name, email = :email, review = :review, photo = :photo WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        
        return $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':email' => $email,
            ':review' => $review,
            ':photo' => $photo
        ]);
    }
}
?>