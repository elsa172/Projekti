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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin'])) {
    // Merr të dhënat nga forma
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Thirri metodën signIn për të kontrolluar hyrjen
    if ($user->signIn($username, $password)) {
        echo "Hyrja u realizua me sukses!";
        // Pas hyrjes, ridrejto në faqen e menaxhimit të eventeve
        header("Location: Homepage.php");
        exit();
    } else {
        echo "Emri i përdoruesit ose fjalëkalimi është i gabuar!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
    <link rel="stylesheet" href="Signin-up.css">
</head>
<body>
    <div class="container">
        <form action=""  method="POST" class="sign-in-form">
            <h2 class="title">Sign in</h2>
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
                <input type="text" placeholder="Username" required>
            </div>
            <div class="input-form">
                <input type="password" placeholder="Password" required>
            </div>
            <input type="submit" value="Sign-in" class="btn">
            <p class="account-text"> Don't have an account? <a href="Signup.php"> Sign up</a></p>
        </form>
    </div>
    
</body>
</html>