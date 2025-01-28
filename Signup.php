<?php
// Përfshi klasën e bazës së të dhënave dhe klasën e përdoruesit
require_once 'Database.php';
require_once 'User.php';

// Krijo një instancë të klasës Database
$database = new Database();
$db = $database->getConnection();

// Krijo një instancë të klasës User dhe kaloni lidhjen me bazën
$user = new User($db);

// Kontrollo nëse forma është dërguar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    // Merr të dhënat nga forma
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Thirri metodën signUp për të regjistruar përdoruesin
    if ($user->signUp($username, $email, $password)) {
        echo "Përdoruesi u regjistrua me sukses!";
        // Pas regjistrimit, ridrejto në homepage
        header("Location: homepage.php"); // Sigurohu që ke një faqe homepage.php
        exit();
    } else {
        echo "Gabim gjatë regjistrimit!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="Signin-up.css">
</head>
<body>
    <div class="container">
        <form action="Signup.php" method="POST" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="social-media">
                <a href="#" class="social-icon">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <div class="input-form">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-form">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-form">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" name="signup" value="Sign up" class="btn">
            <p class="account-text">Already have an account? <a href="Signin.php">Sign in</a></p>
        </form>
    </div>
</body>
</html>
