<?php
require_once "Review.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $reviewObj = new Review();

    if ($reviewObj->deleteReview($id)) {
        header('Location: reviews-manage.php');
    } else {
        echo "Error deleting review.";
    }
} else {
    echo "Invalid request.";
}
?>