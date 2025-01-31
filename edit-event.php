<?php
include_once 'Database.php';
include_once 'Event.php';

$database = new Database();
$db = $database->getConnection();

$event = new Event($db);

$id = $_GET['id'] ?? null;
if ($id) {
    $eventData = $event->getEventById($id);
    if ($eventData) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'] ?? $eventData['title'];
            $date = $_POST['date'] ?? $eventData['date'];
            $time = $_POST['time'] ?? $eventData['time'];
            $location = $_POST['location'] ?? $eventData['location'];
            $description = $_POST['description'] ?? $eventData['description'];
            $image = $_FILES['image']['name'] ?? $eventData['image'];

            $event->id = $id;
            $event->title = $title;
            $event->date = $date;
            $event->time = $time;
            $event->location = $location;
            $event->description = $description;
            $event->image = $image;

            if ($event->update()) {
                echo "<script>alert('Eventi u përditësua me sukses!'); window.location.href = 'events-manage.php';</script>";
            } else {
                echo "<script>alert('Gabim gjatë përditësimit të eventit'); window.location.href = 'events-manage.php';</script>";
            }
        }
        ?>
        <h2>Edit Event</h2>
        <form method="POST" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($eventData['title']); ?>" required><br>

            <label for="date">Date:</label>
            <input type="date" name="date" value="<?php echo htmlspecialchars($eventData['date']); ?>" required><br>

            <label for="time">Time:</label>
            <input type="time" name="time" value="<?php echo htmlspecialchars($eventData['time']); ?>" required><br>

            <label for="location">Location:</label>
            <input type="text" name="location" value="<?php echo htmlspecialchars($eventData['location']); ?>" required><br>

            <label for="description">Description:</label>
            <textarea name="description" required><?php echo htmlspecialchars($eventData['description']); ?></textarea><br>

            <label for="image">Image:</label>
            <input type="file" name="image"><br>

            <button type="submit">Update Event</button>
        </form>
        <?php
    } else {
        echo "Event not found.";
    }
} else {
    echo "Error: ID not found.";
}
?>
