<?php
include_once 'Database.php';
include_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $user->register($username, $email, $password, $role);

    if ($result === "Regjistrimi u krye me sukses!") {
        header("Location: Signin.html");
        exit;
    } else {
        echo $result;
    }
}

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
    if ($user->register($username, $email, $password, $role)) {
        header("Location: login.php"); // Redirecto në faqen e kyçjes
        exit;
    } else {
        echo "Gabim gjatë regjistrimit!";
    }
}
?>

