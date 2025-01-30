<?php
require_once 'Database.php';
require_once 'Event.php';

$database = new Database();
$db = $database->getConnection();

$event = new Event($db);

if (isset($_GET['id'])) {
    $event->id = $_GET['id'];

    if ($event->deleteEvent()) {
        echo "Event was deleted successfully.";
        header("Location: events-manage.php");
        exit();
    } else {
        echo "Unable to delete the event.";
    }
} else {
    die('ERROR: Event ID not found.');
}
?>
