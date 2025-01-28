<?php
session_start();
include 'Database.php'; // Përfshi klasën Database

// Inicializo lidhjen me databazën
$dbInstance = new Database();
$db = $dbInstance->getConnection(); // Merr lidhjen PDO

$errorMessage = ''; // Variabël për të mbajtur mesazhin e gabimit

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Kontrollo nëse përdoruesi është regjistruar më parë
    $query = "SELECT * FROM user WHERE email = :email"; 
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Nëse përdoruesi ekziston, ruaj mesazhin në variablin $errorMessage
        $errorMessage = "Ky email është regjistruar më parë. Ju lutemi kyçuni.<br><a href='Signin.php'>Shko te Sign in</a>";
    } else {
        // Nëse nuk ekziston, vazhdo me regjistrimin
        $role = (strpos($email, '@admin.com') !== false) ? 'admin' : 'user';

        // Ruaj përdoruesin në bazën e të dhënave
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (username, email, password, role) VALUES (:username, :email, :password, :role)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            header("Location: homepage.php"); // Ridrejto te faqja kryesore
            exit();
        } else {
            $errorMessage = "Gabim gjatë regjistrimit!";
        }
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
    <style>
      
        /* Stilizimi i mesazhit të gabimit */
        .error-message {
            margin-top: 20px;
            color: red;
            font-size: 14px;
            text-align: center;
        }
    </style>
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

        <!-- Div për shfaqjen e mesazhit të gabimit vetëm një herë nën formë -->
        <?php if (!empty($errorMessage)): ?>
            <div class="error-message">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>