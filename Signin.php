<?php
session_start();
include 'Database.php'; 


$dbInstance = new Database();
$db = $dbInstance->getConnection(); 

$errorMessage = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameOrEmail = trim($_POST['usernameOrEmail']); 
    $password = trim($_POST['password']);


    if (empty($usernameOrEmail) || empty($password)) {
        $errorMessage = "Të gjitha fushat janë të detyrueshme!";
    } else {
        try {
            $query = "SELECT * FROM user WHERE username = :usernameOrEmail OR email = :usernameOrEmail";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':usernameOrEmail', $usernameOrEmail);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];

                    if ($user['role'] === 'admin') {
                        header("Location: Dashboard.php");
                    } else {
                        header("Location: Homepage.php");
                    }
                    exit();
                } else {
                    $errorMessage = "Fjalëkalimi nuk është i saktë!";
                }
            } else {
                $errorMessage = "Ky përdorues nuk ekziston!";
            }
        } catch (PDOException $e) {
            
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
       
            <div class="input-form">
                <input type="text" name="usernameOrEmail" placeholder="Username or Email" required>
            </div>
            <div class="input-form">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" value="Sign-in" class="btn">
            <p class="account-text"> Don't have an account? <a href="Signup.php"> Sign up</a></p>
        </form>

        <?php if (!empty($errorMessage)): ?>
            <div class="error-message">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
    </div>

    <style>
   
        .error-message {
            margin-top: 20px;
            color: red;
            font-size: 14px;
            text-align: center;
        }
    </style>
    <script src="signin.js"></script>

</body>
</html>
