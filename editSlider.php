<?php
require_once 'Database.php';

if (isset($_GET['ID'])) {
    $eventId = $_GET['ID'];

    $db = new Database();
    $conn = $db->getConnection();
    $query = "SELECT * FROM successful_events WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$eventId]);
    $event = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$event) {
        echo "Ngjarja nuk u gjet!";
        exit();
    }
} else {
    echo "ID-ja e ngjarjes nuk është e dhënë!";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $image = $_FILES["image"];

    $imageName = $event['image']; 

    if (!empty($image["name"])) {
        $imageName = time() . "_" . basename($image["name"]);
        $targetPath = "uploads/" . $imageName;

        if (!move_uploaded_file($image["tmp_name"], $targetPath)) {
            echo "Gabim gjatë ngarkimit të imazhit!";
            exit();
        }
    }
    $query = "UPDATE successful_events SET title = ?, description = ?, image = ? WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$title, $description, $imageName, $eventId]);

    header("Location: adminSlider.php?success=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="stylesheet" href="adminSlider.css">
</head>
<body>
<header>
    <div class="header-logo">
        <img src="logoEventopia.png" alt="Logo">
    </div>
    <nav>
        <ul>
            <li><a href="adminSlider.php">Dashboard</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <h1>Edit Event</h1>
    <form action="editSlider.php?ID=<?= $eventId ?>" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" value="<?= htmlspecialchars($event['title']) ?>" placeholder="Title of Event" required>
        <textarea name="description" placeholder=" Event description" required><?= htmlspecialchars($event['description']) ?></textarea>
        <input type="file" name="image">
        <button type="submit">Edit</button>
    </form>
</div>

</body>
</html>
