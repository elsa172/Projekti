
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
            <li><a href="adminDashboard.php">Dashboard</a></li>
        </ul>
    </nav>
</header>

<div class="events-container">
    <h2>Manage Events</h2>
    <table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
            <th>Description</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($events as $event): ?>
        <tr>
            <td><?php echo htmlspecialchars($event['title']); ?></td>
            <td><?php echo htmlspecialchars($event['event_date']); ?></td>
            <td><?php echo htmlspecialchars($event['event_time']); ?></td>
            <td><?php echo htmlspecialchars($event['location']); ?></td>
            <td><?php echo htmlspecialchars($event['description']); ?></td>
            <td>
                <?php if (!empty($event['image_path'])): ?>
                    <img src="<?php echo htmlspecialchars($event['image_path']); ?>" alt="Event Image" width="100">
                <?php else: ?>
                    No Image
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
 
</body>
</html>
