<?php
require_once "Database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $database = new Database();
        $conn = $database->getConnection();

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        $special_request = isset($_POST['special_requests']) ? $_POST['special_requests'] : '';

        $start_time = isset($_POST['start_time']) ? substr($_POST['start_time'], 0, 5) : ''; 
        $end_time = isset($_POST['end_time']) ? substr($_POST['end_time'], 0, 5) : ''; 

        $sql = "INSERT INTO manageeventfromklient (Name, Surname, Email, Phone, City, Event_name, Event_date, Start_time, End_time, Adress, Event_preferences, Attendees, Services, Budget, Speial_request, Card_type, Card_number, Card_expiry, Terms_accepted) 
                VALUES (:name, :surname, :email, :phone, :city, :event_name, :event_date, :start_time, :end_time, :address, :event_preferences, :attendees, :services, :budget, :special_request, :card_type, :card_number, :card_expiry, :terms_accepted)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':surname', $_POST['surname']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':phone', $_POST['phone']);
        $stmt->bindParam(':city', $_POST['city']);
        $stmt->bindParam(':event_name', $_POST['event_name']);
        $stmt->bindParam(':event_date', $_POST['event_date']);
        $stmt->bindParam(':start_time', $start_time);  
        $stmt->bindParam(':end_time', $end_time);     
        $stmt->bindParam(':address', $_POST['address']);
        $stmt->bindParam(':event_preferences', $_POST['event_preferences']);
        $stmt->bindParam(':attendees', $_POST['attendees']);
        
        $services = isset($_POST['services']) ? implode(", ", $_POST['services']) : '';
        $stmt->bindParam(':services', $services);

        $stmt->bindParam(':budget', $_POST['budget']);
        $stmt->bindParam(':special_request', $special_request);

        $stmt->bindParam(':card_type', $_POST['card_type']);
        $stmt->bindParam(':card_number', $_POST['card_number']);
        $stmt->bindParam(':card_expiry', $_POST['card_expiry']);

        $terms_accepted = isset($_POST['terms_and_conditions']) ? 1 : 0;
        $stmt->bindParam(':terms_accepted', $terms_accepted);

        if ($stmt->execute()) {
            echo "Event booked successfully!";
            header("Location: admin.manage.klient.php"); 
            exit();
        } else {
            echo "Error: Event not booked.";
            print_r($stmt->errorInfo());
        }
        
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
