<?php
// Include the necessary database connection and User class file
include_once 'Database.php'; // Make sure this is the correct path to Database.php
include_once 'User.php'; // Assuming the User class is in a file called User.php

// Create a new database connection
$database = new Database();
$db = $database->getConnection(); // Get the connection

// Create an instance of the User class
$user = new User($db); // $db is the database connection object

// Retrieve users from the database
$query = "SELECT id, username, email FROM user"; // Adjust table and fields as necessary
$stmt = $db->prepare($query);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="users-manage.css">
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

<div class="users-container">
    <h2>Manage Users</h2>
    <table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['username']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td>*******</td> <!-- Optionally, you can display something else for password -->
            <td>
                <a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_user.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
    </table>
</div>
</body>
</html>

</body>
</html>
