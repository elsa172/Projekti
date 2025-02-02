<?php
require_once 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $image = $_FILES["image"];

    $imageName = time() . "_" . basename($image["name"]);
    $targetPath = "uploads/" . $imageName;

    if (move_uploaded_file($image["tmp_name"], $targetPath)) {
        $db = new Database();
        $conn = $db->getConnection();

        $query = "INSERT INTO successful_events (title, description, image) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$title, $description, $imageName]);

        header("Location: adminSlider.php?success=1");
        exit();
    } else {
        echo "Gabim gjatë ngarkimit të imazhit!";
    }
}
?>
