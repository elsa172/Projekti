<?php
require_once "Database.php";

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];

    $database = new Database();
    $db = $database->getConnection();

    $query = "DELETE FROM eventetaktuale WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $eventId);

    if ($stmt->execute()) {
        echo "<script>
                alert('Event deleted successfully!');
                window.location.href = 'adminEventetaktuale.php';
              </script>";
    } else {
        echo "<script>alert('Error deleting event.');</script>";
    }
} else {
    echo "<script>alert('Invalid event ID.');</script>";
    echo "<script>window.location.href = 'adminEventetaktuale.php';</script>";
}
?>