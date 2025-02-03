<?php
require_once "Database.php";

$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT * FROM manageeventfromklient";
$stmt = $conn->query($sql);
$manageeventfromklient = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Manage</title>
    <link rel="stylesheet" href="admin.manage.klient.css">
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

    <div class="messages-container">
        <h1>Manage Your Event List</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Event Name</th>
                <th>Event Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Address</th>
                <th>Event</th>
                <th>Attendees</th>
                <th>Budget</th>
                <th>Special Requests</th>
                <th>Card Type</th>
                <th>Card Number</th>
                <th>Card Expiry</th>
                <th>Terms</th>
            </tr>
            <?php foreach ($manageeventfromklient as $event): ?>
            <tr>
                <td><?= htmlspecialchars($event['ID']) ?></td>
                <td><?= htmlspecialchars($event['Name']) ?></td>
                <td><?= htmlspecialchars($event['Surname']) ?></td>
                <td><?= htmlspecialchars($event['Email']) ?></td>
                <td><?= htmlspecialchars($event['Phone']) ?></td>
                <td><?= htmlspecialchars($event['City']) ?></td>
                <td><?= htmlspecialchars($event['Event_name']) ?></td>
                <td><?= htmlspecialchars($event['Event_date']) ?></td>
                <td><?= htmlspecialchars(date("H:i", strtotime($event['Start_time']))) ?></td>
                <td><?= htmlspecialchars(date("H:i", strtotime($event['End_time']))) ?></td>
                <td><?= htmlspecialchars($event['Adress']) ?></td>
                <td><?= htmlspecialchars($event['Event_preferences']) ?></td>
                <td><?= htmlspecialchars($event['Attendees']) ?></td>
                <td><?= htmlspecialchars($event['Budget']) ?></td>
                <td><?= htmlspecialchars($event['Speial_request']) ?></td>
                <td><?= htmlspecialchars($event['Card_type']) ?></td>
                <td><?= htmlspecialchars($event['Card_number']) ?></td>
                <td><?= htmlspecialchars($event['Card_expiry']) ?></td>
                <td><?= $event['Terms_accepted'] ? 'Yes' : 'No' ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
