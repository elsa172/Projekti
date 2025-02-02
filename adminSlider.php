<?php
require_once 'Database.php';

$db = new Database();
$conn = $db->getConnection(); 

$query = "SELECT * FROM successful_events";
$stmt = $conn->query($query);
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Slider</title>
    <link rel="stylesheet" href="adminSlider.css"> 
</head>
<body>
<header>
    <div class="header-logo">
        <img src="logoEventopia.png" alt="Logo">
    </div>
    <nav>
        <ul>
            <li><a href="#">Dashboard</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <h1>Successful Events</h1>

    <table>
    <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Title</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($events as $event): ?>
    <tr>
        <td><?= htmlspecialchars($event['ID']) ?></td>
        <td><img src="uploads/<?= htmlspecialchars($event['image']) ?>" width="100" alt="Event Image"></td>
        <td><?= htmlspecialchars($event['title']) ?></td>
        <td><?= htmlspecialchars($event['description']) ?></td>
        <td class="actions">
        <a href="editSlider.php?ID=<?= $event['ID'] ?>" class="edit-button">Edit</a>

    
        <a href="deleteSlider.php?ID=<?= $event['ID'] ?>" class="delete-button">Delete</a>


</td>

    </tr>
    <?php endforeach; ?>
</table>


    <h2>Add New Event</h2>
    <form action="slider.lidhja.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Event Title" required>
        <textarea name="description" placeholder="Event Description" required></textarea>
        <input type="file" name="image" required>
        <button type="submit">Add Event</button>
    </form>
</div>

</body>
</html>
