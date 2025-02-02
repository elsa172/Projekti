<?php
session_start();
include 'Database.php'; 

$dbInstance = new Database();
$db = $dbInstance->getConnection(); 

$errorMessage = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM user WHERE email = :email"; 
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $errorMessage = "Ky email është regjistruar më parë. Ju lutemi kyçuni.<br><a href='Signin.php'>Shko te Sign in</a>";
    } else {
        $role = (strpos($email, '@admin.com') !== false) ? 'admin' : 'user';

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (username, email, password, role) VALUES (:username, :email, :password, :role)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            $_SESSION['user_id'] = $db->lastInsertId();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            if ($role === 'admin') {
                header("Location: Dashboard.php");
            } else {
                header("Location: Homepage.php");
            }
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

  
        <?php if (!empty($errorMessage)): ?>
            <div class="error-message">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="signup.js"></script>
</body>
</html>