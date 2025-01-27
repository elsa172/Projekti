<?php
include_once 'Database.php';
include_once 'Useri.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    // Merr të dhënat nga forma
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Roli opsional për përdoruesin e ri
    $role = isset($_POST['role']) ? $_POST['role'] : 'user'; // Default 'user'

    // Regjistro përdoruesin
    if ($user->register($username, $password, $role)) {
        header("Location: login.php"); // Redirecto në faqen e kyçjes
        exit;
    } else {
        echo "Gabim gjatë regjistrimit!";
    }
}
?>

<form action="register_user.php" method="POST">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Role (optional): 
    <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br>
    <button type="submit">Register</button>
</form>
