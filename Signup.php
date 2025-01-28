<?php
// Përfshi klasat për lidhjen me bazën e të dhënave dhe menaxhimin e përdoruesve
require_once 'Database.php';
require_once 'User.php';

// Kontrollo nëse forma është dërguar me metodën POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
    // Lidhja me bazën e të dhënave
    $database = new Database();
    $db = $database->connect();

    // Inicializo klasën User
    $user = new User($db);

    // Merr të dhënat nga forma dhe i filtro
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Thirr metodën signUp për të regjistruar përdoruesin
    if ($user->signUp($username, $email, $password)) {
        // Nëse regjistrimi është i suksesshëm, ridrejto te Homepage.html
        header("Location: Homepage.html");
        exit();
    } else {
        // Nëse ka dështim, shfaq një mesazh gabimi
        echo "Failed to register user. Please try again.";
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
            <p class="account-text">Already have an account? <a href="Signin.html">Sign in</a></p>
        </form>
    </div>
</body>
</html>
