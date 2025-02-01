<?php
require_once "Review.php";

$reviewObj = new Review();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
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

    if ($reviewObj->updateReview($id, $name, $email, $review, $photo)) {
        header('Location: reviews-manage.php');
    } else {
        echo "Error updating review.";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $reviews = $reviewObj->getReviews();
    $review = null;

    foreach ($reviews as $r) {
        if ($r['id'] == $id) {
            $review = $r;
            break;
        }
    }

    if (!$review) {
        echo "Review not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>
</head>
<body>
    <h2>Edit Review</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $review['id'] ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($review['name']) ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($review['email']) ?>" required>
        <br>
        <label for="review">Review:</label>
        <textarea name="review" required><?= htmlspecialchars($review['review']) ?></textarea>
        <br>
        <label for="photo">Photo:</label>
        <input type="file" name="photo">
        <br>
        <button type="submit">Update Review</button>
    </form>
</body>
</html>