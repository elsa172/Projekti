<?php
class Eventetaktuale {
    private $conn;
    private $table = "eventetaktuale";

    public $id;
    public $title;
    public $description;
    public $event_date;
    public $image;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addEventToCurrent($title, $description, $event_date, $image) {
        $query = "INSERT INTO " . $this->table . " (title, description, event_date, image) 
                  VALUES (:title, :description, :event_date, :image)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':event_date', $event_date);
        $stmt->bindParam(':image', $image);

        return $stmt->execute();
    }
}
?>

