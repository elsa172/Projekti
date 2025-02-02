<?php
include 'Database.php'; 

$database = new Database();
$conn = $database->getConnection();


$sql = "SELECT * FROM message ORDER BY ID DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$message = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Messages</title>
    <link rel="stylesheet" href="adminMessage.css">
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

<div class="messages-container">
    <h1>Mesazhet e Klientëve</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Emri</th>
                <th>Email</th>
                <th>Mesazhi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($message) > 0) {
                foreach ($message as $message) {
                    echo "<tr>
                            <td>" . htmlspecialchars($message['ID']) . "</td>
                            <td>" . htmlspecialchars($message['Name']) . "</td>
                            <td>" . htmlspecialchars($message['Email']) . "</td>
                            <td>" . htmlspecialchars($message['Message']) . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nuk ka mesazhe.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
