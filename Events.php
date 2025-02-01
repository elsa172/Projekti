<?php
require_once "Database.php";

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM eventetaktuale";
$stmt = $db->prepare($query);
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="Events.css">
</head>
<body>
    <header>
        <img class="logo" src="logoEventopia.png" alt="logo">
        <nav>
            <ul class="nav-links">
                <li><a href="Homepage.php">Home</a></li>
                <li><a href="AboutUs.php">About us</a></li>
                <li><a href="Events.php">Events</a></li>
                <li><a href="ContactUs.php">Contact us</a></li>
            </ul>
        </nav>
        <div class="nav-butonat">
            <a href="Signin.php"><button>Login</button></a>
            <a href="Signup.php"><button>Sign Up</button></a>
        </div>
    </header>
    <div class="conteiner">
    
    <div class="pjesakryesore">
      <h1>Events</h1>
    </div>
 <div class="kuti-te-medha">
      <div class="kuti-e-madhe">
        <h2>Create Your Event and Make It Unforgettable!</h2>
        <h2>Turn Your Event Ideas into Reality...</h2>
        <p>Have an exciting event idea? It’s time to bring it to life! Click here to add your event, set the details, and share your vision with the world. Whether it’s a small gathering or a large-scale celebration, our platform makes it easy to get started and manage every aspect of your event. Let’s make your event unforgettable!</p>
       <a href="Addevents.php"> <button>Add Event</button></a>
      </div>
      <div class="kuti-e-madhe">
        <h2>Ready to Take Charge of Your Event?</h2>
        <h2>Manage It Like a Pro!</h2>
        <p>Take control of your event like never before! With just a click, you can organize, track, and ensure everything runs smoothly. From planning to execution, our platform gives you the tools to manage every detail with ease. Ready to make your event a success? Start now and bring your vision to life! </p>
       <a href="Manage.html"> <button>Manage Event</button></a>
      </div>
    </div>

        <div class="rrjete">
            <?php foreach ($events as $event): ?>
            <div class="kuti">
                <img src="<?php echo htmlspecialchars($event['image']); ?>" alt="Event Image">
                <h2><?php echo htmlspecialchars($event['title']); ?></h2>
                <p><?php echo htmlspecialchars($event['description']); ?></p>
                <p><?php echo htmlspecialchars($event['date']); ?></p>
                <button>Discover More</button>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="card">
    <h1 class="titulli"> Work Opportunities in Open Events</h1>
    <p class="paragrafi">Eventopia is a platform that connects individuals with job opportunities in various events. Through this website, you can apply for daily or long-term jobs depending on the event’s needs. Event organizers can post calls for volunteers or paid workers, making it easier to find the right people to bring their activities to life. If you're looking for flexible work and want to engage in exciting events, Eventopia is the perfect place for you!</p>
<a class="butoni"   href="C:\Users\cakiq\OneDrive\Desktop\Projekti\About us\AboutUs.html"><button>Learn more</button></a>
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