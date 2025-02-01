<?php
class Eventetaktuale {
    private $conn;
    private $table = "eventetaktuale";

    public $id;
    public $title;
    public $date;
    public $time;
    public $location;
    public $description;
    public $image;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addEventToCurrent($title, $date, $time, $location, $description, $image) {
        $query = "INSERT INTO " . $this->table . " (title, date, time, location, description, image) 
                  VALUES (:title, :date, :time, :location, :description, :image)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);

        return $stmt->execute();
    }
}
?>