<?php
include 'Event.php';

$event = new Event();

if (isset($_GET['delete'])) {
    $eventId = $_GET['delete'];
    if ($event->deleteEvent($eventId)) {
        header('Location: events-manage.php');  
        exit;
    } else {
        echo "Unable to delete the event.";
    }
}
?>