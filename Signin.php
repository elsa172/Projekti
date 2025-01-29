<?php
session_start();
include 'Database.php'; // Përfshi klasën për databazën

// Inicializo lidhjen me databazën
$dbInstance = new Database();
$db = $dbInstance->getConnection(); // Merr lidhjen PDO

$errorMessage = ''; // Variabël për të mbajtur mesazhin e gabimit

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameOrEmail = trim($_POST['usernameOrEmail']); // Të dyja fushat mund të përdoren
    $password = trim($_POST['password']);

    // Kontrollo nëse fushat janë të mbushura
    if (empty($usernameOrEmail) || empty($password)) {
        $errorMessage = "Të gjitha fushat janë të detyrueshme!";
    } else {
        try {
            // Kontrollo nëse përdoruesi ekziston në databazë
            $query = "SELECT * FROM user WHERE username = :usernameOrEmail OR email = :usernameOrEmail";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':usernameOrEmail', $usernameOrEmail);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Kontrollo nëse përdoruesi është gjetur
            if ($user) {
                // Verifikimi i fjalëkalimit
                if (password_verify($password, $user['password'])) {
                    // Përdoruesi është autentifikuar me sukses, ruaj të dhënat në sesion
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];

                    // Ridrejto në faqen kryesore
                    header("Location: homepage.php");
                    exit();
                } else {
                    $errorMessage = "Fjalëkalimi nuk është i saktë!";
                }
            } else {
                $errorMessage = "Ky përdorues nuk ekziston!";
            }
        } catch (PDOException $e) {
            // Gabim në databazë
            $errorMessage = "Gabim në databazë: " . $e->getMessage();
        }
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
        <form action="" method="POST" class="sign-in-form">
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
                <input type="text" name="usernameOrEmail" placeholder="Username or Email" required>
            </div>
            <div class="input-form">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" value="Sign-in" class="btn">
            <p class="account-text"> Don't have an account? <a href="Signup.php"> Sign up</a></p>
        </form>

        <!-- Shfaq mesazhin e gabimit nëse ekziston -->
        <?php if (!empty($errorMessage)): ?>
            <div class="error-message">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
    </div>

    <style>
        /* Stilizimi i mesazhit të gabimit */
        .error-message {
            margin-top: 20px;
            color: red;
            font-size: 14px;
            text-align: center;
        }
    </style>

</body>
</html>