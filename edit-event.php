<?php
include 'Event.php';

$event = new Event();
$eventDetails = null; 

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $eventDetails = $event->getEventById($eventId); 
}

if (!$eventDetails) {
    echo "Event not found or invalid ID!"; 
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['event-title']);
    $date = trim($_POST['event-date']);
    $time = trim($_POST['event-time']);
    $location = trim($_POST['event-location']);
    $description = trim($_POST['event-description']);
    $image = $eventDetails['image'];  

  
    if (isset($_FILES['event-image']) && $_FILES['event-image']['error'] == 0) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $imageName = time() . "_" . basename($_FILES["event-image"]["name"]);
        $imagePath = $targetDir . $imageName;

  
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "Invalid image format. Only JPG, JPEG, PNG, and GIF are allowed.";
            exit;
        }

        if ($_FILES["event-image"]["size"] > 5 * 1024 * 1024) {
            echo "The image size should not exceed 5MB.";
            exit;
        }

        move_uploaded_file($_FILES["event-image"]["tmp_name"], $imagePath);
        $image = $imagePath;  
    }


    $event->updateEvent($eventId, $title, $date, $time, $location, $description, $image);
    header("Location: events-manage.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="edit-event.css"> 
</head>
<body>

<div class="form-container">
    <h2>Edit Event</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="event-title">Title:</label>
        <input type="text" name="event-title" value="<?php echo htmlspecialchars($eventDetails['title']); ?>" required><br>

        <label for="event-date">Date:</label>
        <input type="date" name="event-date" value="<?php echo htmlspecialchars($eventDetails['date']); ?>" required><br>

        <label for="event-time">Time:</label>
        <input type="time" name="event-time" value="<?php echo htmlspecialchars($eventDetails['time']); ?>"><br>

        <label for="event-location">Location:</label>
        <input type="text" name="event-location" value="<?php echo htmlspecialchars($eventDetails['location']); ?>" required><br>

        <label for="event-description">Description:</label>
        <textarea name="event-description"><?php echo htmlspecialchars($eventDetails['description']); ?></textarea><br>

        <label for="event-image">Image:</label>
        <input type="file" name="event-image"><br>

        <button type="submit" class="btn-submit">Update Event</button>
    </form>
</div>

</body>
</html>
