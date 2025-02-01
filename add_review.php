<?php
require_once "Review.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $review = htmlspecialchars($_POST['review']);
    $photo = null;

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $photoName = basename($_FILES['photo']['name']);
        $photoPath = $uploadDir . $photoName;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {
            $photo = $photoPath;
        } else {
            echo "Error uploading photo.";
            exit;
        }
    }

    $reviewObj = new Review();
    if ($reviewObj->addReview($name, $email, $review, $photo)) {
        header('Location: adminReviews.php');
    } else {
        echo "Error adding review.";
    }
}
?>