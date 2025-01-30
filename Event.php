<?php
include 'Database.php';

class Event {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function eventExists($title, $date) {
        $sql = "SELECT COUNT(*) FROM events WHERE title = ? AND date = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$title, $date]);
        return $stmt->fetchColumn() > 0; 
    }

    public function addEvent($title, $date, $time, $location, $description, $image) {
        $sql = "INSERT INTO events (title, date, time, location, description, image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$title, $date, $time, $location, $description, $image]);
    }

    public function updateEvent($id, $title, $date, $time, $location, $description, $image) {
        $sql = "UPDATE events SET title = ?, date = ?, time = ?, location = ?, description = ?, image = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$title, $date, $time, $location, $description, $image, $id]);
    }


    public function deleteEvent($id) {
        $sql = "DELETE FROM events WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function getEvents() {
        $sql = "SELECT * FROM events";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEventById($id) {
        $sql = "SELECT * FROM events WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
