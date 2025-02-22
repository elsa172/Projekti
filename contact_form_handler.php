<?php
include 'Database.php'; 

$database = new Database();
$conn = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($message)) {
        // Perdorim prepared statements 
        $sql = "INSERT INTO message (Name, Email, Message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Lidh parametrat me bindValue per PDO
        $stmt->bindValue(1, $name, PDO::PARAM_STR);
        $stmt->bindValue(2, $email, PDO::PARAM_STR);
        $stmt->bindValue(3, $message, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Mesazhi u dërgua me sukses!');
                    window.location.href = 'ContactUs.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gabim gjatë dërgimit të mesazhit.');
                    window.location.href = 'ContactUs.php';
                  </script>";
        } 
        } else {
            echo "<script>
                    alert('Please fill in all fields correctly!');</script>";
        }
        
}
?>
