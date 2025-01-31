<?php
include_once 'Database.php';
include_once 'Event.php';


$database = new Database();
$db = $database->getConnection();


$event = new Event($db);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = trim($_POST['event_id']); 

    if ($event->addToCurrent($event_id)) {
        echo "<script>
                alert('Eventi u shtua në eventetaktuale me sukses!');
                window.location.href = 'events.php';  // Ridrejtohet në faqen e eventeve
              </script>";
    } else {
        echo "<script>
                alert('Gabim gjatë shtimit të eventit në eventetaktuale!');
                window.location.href = 'events.php';  // Ridrejtohet në faqen e eventeve
              </script>";
    }
}
?>