<?php
require_once "Database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $image = 'uploads/' . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
        $database = new Database();
        $conn = $database->getConnection();

        $query = "INSERT INTO eventetaktuale (title, description, date, image) 
                  VALUES (:title, :description, :date, :image)";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':image', $image);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Event added successfully!');
                    window.location.href = 'adminEventetaktuale.php';
                  </script>";
        } else {
            echo "<script>alert('Error adding event.');</script>";
        }
    } else {
        echo "<script>alert('Error uploading image.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" href="add.eventetaktuale.css">
</head>
<body>
    <div class="form-container">
        <h1>Add New Event</h1>
        <form action="add.eventetaktuale.php" method="POST" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required>

            <input type="submit" value="Add Event">
        </form>
    </div>
</body>
</html>