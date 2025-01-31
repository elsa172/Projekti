<?php
include_once 'Database.php';
include_once 'Event.php';

$database = new Database();
$db = $database->getConnection();

$event = new Event($db);
$stmt = $event->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <link rel="stylesheet" href="events-manage.css">
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
    <h2>Events from Clients Forms</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['title']); ?></td>
                <td><?php echo htmlspecialchars($row['date']); ?></td>
                <td><?php echo htmlspecialchars($row['time']); ?></td>
                <td><?php echo htmlspecialchars($row['location']); ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
                <td>
                    <?php if (!empty($row['image'])): ?>
                        <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Event Image" width="100">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
                <td>
                    <a href="edit-event.php?id=<?php echo htmlspecialchars($row['id']); ?>">Edit</a> |
                    <a href="delete-event.php?id=<?php echo htmlspecialchars($row['id']); ?>" onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
