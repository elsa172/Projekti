<?php
require_once "aplikimet_lidhja.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aplikimi = new Aplikimi();

    if (isset($_POST['name'], $_POST['surname'], $_POST['role'], $_POST['description'], $_FILES['photo'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $role = $_POST['role'];
        $description = $_POST['description'];

        // Trajtimi i fotos
        $target_dir = "uploads/";
        $photo_name = time() . "_" . basename($_FILES["photo"]["name"]);
        $photo_path = $target_dir . $photo_name;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $photo_path)) {
            if ($aplikimi->registerApplication($name, $surname, $role, $description, $photo_path)) {
                echo "<script>alert('Application submitted successfully!');</script>";
            } else {
                echo "<script>alert('Error submitting application.');</script>";
            }
        } else {
            echo "<script>alert('Failed to upload photo.');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields correctly.');</script>";
    }
}
?>
