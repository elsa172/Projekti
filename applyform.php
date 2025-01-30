<?php
require_once "aplikimet_lidhja.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aplikimi = new Aplikimi();
    
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $role = $_POST['role'];
    $description = $_POST['description'];
    
    $target_dir = "uploads/";
    $photo_name = time() . "_" . basename($_FILES["photo"]["name"]);
    $photo_path = $target_dir . $photo_name;
    move_uploaded_file($_FILES["photo"]["tmp_name"], $photo_path);

    if ($aplikimi->registerApplication($name, $surname, $role, $description, $photo_path)) {
        echo "<script>alert('Application submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting application.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply form</title>
    <link rel="stylesheet" href="applyform.css">
</head>
<body>
    <div class="container">
        <h1>Job Application</h1>
        <form action="apply_form_handler.php" method="POST" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname" required>

            <label for="role"> Wanted role:</label>
            <input type="text" name="role" id="role" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="4" required></textarea>

            <label for="photo">Photo(Select one photo to upload)</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>

            <button type="submit">Submit</button>
        </form>
    </div>
    
</body>
</html>