<?php
require_once "Database.php";

if (isset($_GET['id'])) {
    $staffId = $_GET['id'];

    try {
        $database = new Database();
        $conn = $database->getConnection();  

        $sql = "DELETE FROM staff WHERE ID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $staffId);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Staff with ID $staffId has been successfully deleted.');
                    window.location.href = 'adminStaff.php';
                  </script>";
        } else {
            echo "<script>alert('Error deleting staff.');</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Database error: " . $e->getMessage() . "');</script>";
    }
}
?>
