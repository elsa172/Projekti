<?php
include 'Database.php'; 
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
}

if (!empty($name) && !empty($email) && !empty($message)) {
    // Përdorim prepared statements 
    $sql = "INSERT INTO messages (Name, Email, Message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="ContactUs.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_forward" />
</head>
<body>
    <header >
        <img class="logo" src="logoEventopia.png" alt="logo">
        <nav>
        <ul class="nav-links">
            <li><a href="Homepage.php">Home</a></li>
            <li><a href="AboutUs.php">About us</a></li>
            <li><a href="Events.php">Events</a></li>
            <li><a href="ContactUs.php">Contact us</a></li>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                <li><a href="Dashboard.php">Dashboard</a></li>
            <?php endif; ?>

        </ul>
    </nav>
   
     </header>
    <div class="container">
        <div class="form-section">
            <h1 class="h1">Contact us</h1>
            <p class="paragrafi">We'd love to hear from you! How can we help?</p>
        <form action="contact_form_handler.php" method="POST">
               <div class="inputBox">
                  <input type="text" name="name" placeholder="Enter your name" required>
                </div>
                <div class="inputBox">
                  <input type="email" name="email" placeholder="Enter your email address" required>
                </div>
                <div class="inputBox">
                 <textarea name="message" placeholder="Enter your message..." required></textarea>
                </div>
                 <button type="submit" class="button">Submit</button>
        </form>

        </div>
        <div class="full-contact-info">
            <div class="illustration">
                <img src="photo.jpg" alt="Foto e contact">
            </div>
            <div class="contact-info">
                <div class="infoBox">
                    <ion-icon name="location"></ion-icon>
                    <p>Rruga Nene Tereza, Nr.15 , Prishtine</p>
                </div>
                <div class="infoBox">
                    <ion-icon name="call-"></ion-icon>
                    <a href="tel">048-233-709</a>
                </div>
                <div class="infoBox">
                    <ion-icon name="mail"></ion-icon>
                    <a href="email">eventopia@gmail.com</a>
                </div>
            </div>
            
        </div>
    </div>
</body>
<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3 class="footer-title">Eventopia</h3>
            <p class="footer-description">Stay connected, stay informed. Join us for exciting events and opportunities!</p>
        </div>
        
        <div class="footer-section">
            <h3 class="footer-title">Quick Links</h3>
            <ul class="footer-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Upcoming Events</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3 class="footer-title">Follow Us</h3>
            <div class="social-links">
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p> 2024 Eventopia. All Rights Reserved.</p>
    </div>
</footer>

</html>
</html>
