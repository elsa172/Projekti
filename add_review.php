<?php
require_once "Review.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Ju duhet të jeni të loguar për të shtuar një review.'); window.location.href = 'Signin.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $review = htmlspecialchars(trim($_POST['review']));
    $photo = '';

    if (!$email) {
        echo "<script>alert('Emaili nuk është i vlefshëm!'); window.location.href = 'Homepage.php';</script>";
        exit;
    }

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $photoExt = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $photoName = uniqid('photo_', true) . '.' . $photoExt;
        $photoPath = $uploadDir . $photoName;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {
            $photo = $photoPath;
        } else {
            echo "<script>alert('Gabim gjatë ngarkimit të fotos!'); window.location.href = 'Homepage.php';</script>";
            exit;
        }
    }

    $reviewObj = new Review();

    if ($reviewObj->addReview($name, $email, $review, $photo)) {
        echo "<script>alert('Review e juaj u shtua me sukses!'); window.location.href = 'Homepage.php';</script>";
        exit;
    } else {
        echo "<script>alert('Ka ndodhur një gabim gjatë shtimit të rishikimit!'); window.location.href = 'Homepage.php';</script>";
        exit;
    }
}
?>
