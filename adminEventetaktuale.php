<?php
require_once "Database.php";

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM eventetaktuale";
$stmt = $db->prepare($query);
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Current Events</title>
    <link rel="stylesheet" href="adminEventetaktuale.css">
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

    <div class="events-container">
        <h2>Current Events</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                <tr>
                    <td><?php echo htmlspecialchars($event['title']); ?></td>
                    <td><?php echo htmlspecialchars($event['date']); ?></td>
                    <td><?php echo htmlspecialchars($event['description']); ?></td>
                    <td>
                        <?php if (!empty($event['image'])): ?>
                            <img src="<?php echo htmlspecialchars($event['image']); ?>" alt="Event Image" width="100">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="edit.eventetaktuale.php?id=<?php echo htmlspecialchars($event['id']); ?>">Edit</a> |
                        <a href="delete.eventetaktuale.php?id=<?php echo htmlspecialchars($event['id']); ?>" onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="add.eventetaktuale.php"><button>Add New Event</button></a>
    </div>
</body>
</html>