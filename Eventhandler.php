<?php
include 'Event.php';

$event = new Event();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['event-title']);
    $date = trim($_POST['event-date']);
    $time = trim($_POST['event-time']);
    $location = trim($_POST['event-location']);
    $description = trim($_POST['event-description']);

    $image = "";
    if (isset($_FILES['event-image']) && $_FILES['event-image']['error'] == 0) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $imageName = time() . "_" . basename($_FILES["event-image"]["name"]);
        $image = $targetDir . $imageName;
        move_uploaded_file($_FILES["event-image"]["tmp_name"], $image);
    }

  
    if ($event->eventExists($title, $date)) {
        echo "<script>
                alert('Ky event është shtuar më parë!');
                window.location.href = 'Addevents.php';
              </script>";
        exit;
    }

    
    if ($event->addEvent($title, $date, $time, $location, $description, $image)) {
        echo "<script>
                alert('Eventi u shtua me sukses!');
                window.location.href = 'events.php';
              </script>";
    } else {
        echo "<script>
                alert('Gabim gjatë shtimit të eventit.');
                window.location.href = 'Addevents.php';
              </script>";
    }
}
?>
