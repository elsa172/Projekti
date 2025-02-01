<?php
require_once "Database.php";

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];

    $database = new Database();
    $db = $database->getConnection();

    $query = "SELECT * FROM eventetaktuale WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $eventId);
    $stmt->execute();
    $event = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $image = $_FILES['image']['name'];

        if (!empty($image)) {
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
            $imagePath = 'uploads/' . $image;
        } else {
            $imagePath = $event['image'];
        }

        $updateQuery = "UPDATE eventetaktuale SET title = :title, description = :description, date = :date, image = :image WHERE id = :id";
        $updateStmt = $db->prepare($updateQuery);
        $updateStmt->bindParam(':title', $title);
        $updateStmt->bindParam(':description', $description);
        $updateStmt->bindParam(':date', $date);
        $updateStmt->bindParam(':image', $imagePath);
        $updateStmt->bindParam(':id', $eventId);

        if ($updateStmt->execute()) {
            echo "<script>
                    alert('Event updated successfully!');
                    window.location.href = 'adminEventetaktuale.php';
                  </script>";
        } else {
            echo "<script>alert('Error updating event.');</script>";
        }
    }
} else {
    echo "<script>alert('Invalid event ID.');</script>";
    echo "<script>window.location.href = 'adminEventetaktuale.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="edit.Eventetaktuale.css">
</head>
<body>
    <h1>Edit Event</h1>
    <form action="edit.eventetaktuale.php?id=<?php echo $eventId; ?>" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($event['title']); ?>" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($event['description']); ?></textarea><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($event['date']); ?>" required><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image"><br>

        <input type="submit" value="Update Event">
    </form>
</body>
</html>