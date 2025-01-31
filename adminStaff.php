<?php
require_once "Database.php";

$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT * FROM staff";
$stmt = $conn->query($sql);
$staffMembers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Staff</title>
    <link rel="stylesheet" href="adminStaff.css">
</head>
<body>
<header>
        <div class="header-logo">
            <img src="logoEventopia.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>Staff List</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Role</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($staffMembers as $staff): ?>
            <tr>
                <td><?= htmlspecialchars($staff['ID']) ?></td>
                <td><?= htmlspecialchars($staff['Name']) ?></td>
                <td><?= htmlspecialchars($staff['Surname']) ?></td>
                <td><?= htmlspecialchars($staff['Role']) ?></td>
                <td><?= htmlspecialchars($staff['Description']) ?></td>
                <td>
                    <img src="<?= isset($staff['Photo']) ? $staff['Photo'] : 'default.jpg' ?>" alt="<?= $staff['Name'] ?>" style="width: 50px; height: auto;">
                </td>
                <td class="actions">
                    <a href="edit.staff.php?id=<?= $staff['ID'] ?>">Edit</a>
                    <a href="delete.staff.php?id=<?= $staff['ID'] ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>

        </table>
    </div>

</body>
</html>
