<?php
require_once 'Database.php';

$db = new Database();
$conn = $db->getConnection(); 

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    $query = "DELETE FROM successful_events WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);

    header("Location: adminSlider.php?success=1");
    exit();
} else {
    echo "ID nuk është i disponueshëm.";
}
?>
