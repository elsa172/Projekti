<?php
include_once 'Database.php';
include_once 'Event.php';

$database = new Database();
$db = $database->getConnection();

$event = new Event($db);

$id = $_GET['id'] ?? null;
if ($id) {
    if ($event->delete($id)) {
        echo "<script>alert('Eventi u fshi me sukses!'); window.location.href = 'events-manage.php';</script>";
    } else {
        echo "<script>alert('Gabim gjatë fshirjes së eventit'); window.location.href = 'events-manage.php';</script>";
    }
} else {
    echo "Error: ID not found.";
}
?>
