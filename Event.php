<?php
class Event {
    private $conn;
    private $table = "events";

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


    public function addEvent($title, $date, $time, $location, $description, $image) {
        $query = "INSERT INTO " . $this->table . " (title, date, time, location, description, image) 
                  VALUES (:title, :date, :time, :location, :description, :image)";
        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars(strip_tags($title));
        $this->date = htmlspecialchars(strip_tags($date));
        $this->time = htmlspecialchars(strip_tags($time));
        $this->location = htmlspecialchars(strip_tags($location));
        $this->description = htmlspecialchars(strip_tags($description));
        $this->image = htmlspecialchars(strip_tags($image));


        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':time', $this->time);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':image', $this->image);


        return $stmt->execute();
    }


    public function eventExists($title, $date) {
        $query = "SELECT id FROM " . $this->table . " WHERE title = :title AND date = :date";
        $stmt = $this->conn->prepare($query);

        $title = htmlspecialchars(strip_tags($title));
        $date = htmlspecialchars(strip_tags($date));

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':date', $date);

        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    public function getEventById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function update() {
        $query = "UPDATE " . $this->table . " SET title = :title, date = :date, time = :time, location = :location, 
                  description = :description, image = :image WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->time = htmlspecialchars(strip_tags($this->time));
        $this->location = htmlspecialchars(strip_tags($this->location));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':time', $this->time);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }


    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function addToCurrent($id) {
        if (empty($id)) {
            die("Gabim: ID e eventit mungon!");
        }
        
        // Merr të dhënat nga tabela 'events'
        $query = "SELECT * FROM events WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if (!$stmt->execute()) {
            $errorInfo = $stmt->errorInfo();
            die('Error executing query: ' . implode(" | ", $errorInfo));
        }
    
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($event) {
            // Shto eventin në tabelën 'eventetaktuale'
            $query2 = "INSERT INTO eventetaktuale (title, description, date, image) 
                       VALUES (:title, :description, :date, :image)";
            $stmt2 = $this->conn->prepare($query2);
            $stmt2->bindParam(':title', $event["title"]);
            $stmt2->bindParam(':description', $event["description"]);
            $stmt2->bindParam(':date', $event["date"]);
            $stmt2->bindParam(':image', $event["image"]);
    
            if ($stmt2->execute()) {
                return true;
            } else {
                $errorInfo = $stmt2->errorInfo();
                die('Error inserting into eventetaktuale: ' . implode(" | ", $errorInfo));
            }
        }
        return false;
    }
}
    

?>
