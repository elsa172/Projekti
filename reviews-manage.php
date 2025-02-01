<?php
require_once "Review.php";
$reviewObj = new Review();
$reviews = $reviewObj->getReviews();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reviews</title>
    <link rel="stylesheet" href="reviews-manage.css">
</head>
<body>
<header>
    <div class="header-logo">
        <img src="logoEventopia.png" alt="Logo">
    </div>
    <nav>
        <ul>
            <li><a href="Dashboard.php">Dashboard</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <h1>Manage Reviews</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Review</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($reviews as $review): ?>
            <tr>
                <td><?= isset($review['id']) ? $review['id'] : 'N/A' ?></td>
                <td><?= isset($review['name']) ? $review['name'] : 'N/A' ?></td>
                <td><?= isset($review['email']) ? $review['email'] : 'N/A' ?></td>
                <td><?= isset($review['review']) ? $review['review'] : 'N/A' ?></td>
                <td><img src="<?= isset($review['photo']) ? $review['photo'] : 'default.jpg' ?>" alt="Photo" width="50"></td>
                <td>
                    <a href="edit_review.php?id=<?= $review['id'] ?>">Edit</a>
                    <a href="delete_review.php?id=<?= $review['id'] ?>" onclick="return confirm('Are you sure you want to delete this review?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add New Review</h2>
    <form action="add_review.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="review" placeholder="Review" required></textarea>
        <input type="file" name="photo">
        <button type="submit">Add Review</button>
    </form>
</div>

</body>
</html>