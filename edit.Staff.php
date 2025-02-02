<?php
require_once "Database.php";

if (isset($_GET['id'])) {
    $staffId = $_GET['id'];

    $database = new Database();
    $conn = $database->getConnection();
    
    $sql = "SELECT * FROM staff WHERE ID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $staffId);
    $stmt->execute();
    $staff = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $role = $_POST['role'];
        $description = $_POST['description'];

        $updateSql = "UPDATE staff SET Name = :name, Surname = :surname, Role = :role, Description = :description WHERE ID = :id";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bindParam(':name', $name);
        $updateStmt->bindParam(':surname', $surname);
        $updateStmt->bindParam(':role', $role);
        $updateStmt->bindParam(':description', $description);
        $updateStmt->bindParam(':id', $staffId);

        if ($updateStmt->execute()) {
            echo "<script>
                    alert('Staff with ID " . $staffId . " updated successfully.');
                    window.location.href = 'adminStaff.php';
                  </script>";
        } else {
            echo "<script>alert('Error updating staff.');</script>";
        }
    }
} else {
    echo "<script>alert('Invalid staff ID.');</script>";
    echo "<script>window.location.href = 'adminStaff.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="adminStaff.css">
    
<head>
    <meta charset="UTF-8">
    <title>Edit Staff</title>
    
</head>
<body>
    <h1>Edit Staff Member</h1>
    <form action="edit.staff.php?id=<?= $staffId ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($staff['Name']) ?>" required><br>

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" value="<?= htmlspecialchars($staff['Surname']) ?>" required><br>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" value="<?= htmlspecialchars($staff['Role']) ?>" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?= htmlspecialchars($staff['Description']) ?></textarea><br>

        <input type="submit" value="Update Staff">
    </form>
</body>
</html>
