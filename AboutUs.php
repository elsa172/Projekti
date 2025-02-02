<?php
require_once "aplikimet_lidhja.php"; 
$aplikimi = new Aplikimi();
$staffMembers = $aplikimi->getStaff(); 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="aboutus.css">
    <script src="aboutUs.js"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
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
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                <li><a href="Dashboard.php">Dashboard</a></li>
            <?php endif; ?>
        </ul>
    </nav>
   
    </header>
    <!--pjesa e header About us ka mu shtu edhe ni background -->
    <div class="header">
        <h1>About Us: We Create Moments, Not Just Events</h1>
        <p>Every event is a story. We are here to write you a beautiful chapter!</p>
    </div>

    <!--Misioni edhe ni foto i shtohet-->
    <div class="our-mission-container">
        <div class="our-mission-content">
            <h4>Our Mission</h4>
            <p>
                To bring a new dimension to local event planning, where every detail tells a story, and every moment becomes an unforgettable memory.  
                We specialize in creating unique and unforgettable private events tailored to your vision. From concept to completion, we manage every detail to ensure your event is seamless and stress-free.  
                Our expertise in local event planning brings your special moments to life, right in your community. Whether it’s an intimate gathering or a grand celebration, we craft experiences that leave lasting impressions.  
                Trust us to handle your private events with creativity, precision, and personalized care. Count on us to manage local events with professionalism, efficiency, and a touch of creativity.
            </p>
        </div>
        <div class="our-mission-image">
            <img src="Screenshot 2024-12-07 215403.png" alt="Event planning in action">
        </div>
    </div>

    <section class="statistics-boxes">
        <div class="stat-box">
            <h3>20+</h3>
            <p>Years of Experience</p>
        </div>
        <div class="stat-box">
            <h3>1000+</h3>
            <p>Projects Done</p>
        </div>
        <div class="stat-box">
            <h3>500+</h3>
            <p>Satisfied Clients</p>
        </div>
        <div class="stat-box">
            <h3>78</h3>
            <p>Awards</p>
        </div>
    </section>

    <!--ka me pas modifikime hala edhe shtimi i icons-->
    <div class="section">
        <h2>What Makes Us Different?</h2>
        <div class="features">
            <div class="feature">
                <h3>Boundless Creativity</h3>
                <p>We don’t think inside the box. We exceed expectations with fresh ideas and unique concepts.</p>
            </div>
            <div class="feature">
                <h3>24/7 Support</h3>
                <p>Our team is available around the clock to ensure everything runs smoothly.</p>
            </div>
            <div class="feature">
                <h3>Stress-Free Planning</h3>
                <p>Our detailed approach ensures a seamless experience so you can focus on enjoying your event.</p>
            </div>
            <div class="feature">
                <h3>Tailored Experiences</h3>
                <p>No two events are the same. We customize every detail to reflect your personality and preferences.</p>
            </div>
            <div class="feature">
                <h3>Exclusive Gifts</h3>
                <p>Make your event unforgettable with unique surprises and customized keepsakes.</p>
            </div>
        </div>

        <!--Slideri-->
        <?php 
    require_once 'Database.php';

    $db = new Database();
    $conn = $db->getConnection();

    $query = "SELECT * FROM successful_events";
    $stmt = $conn->query($query);
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="sliders">
    <div class="slider-header">
        <h2 class="slider-title">What We Realize</h2>
        <p class="slider-subtitle">The Most Successful Events</p>
    </div>
    <div class="swiper">
        <div class="card-wapper">
            <ul class="card-list swiper-wrapper">
                <?php
                if ($events && count($events) > 0): 
                    foreach ($events as $event):
                ?>
                    <li class="card-item swiper-slide">
                        <a href="#" class="card-link">
                            <img src="uploads/<?= htmlspecialchars($event['image']) ?>" alt="<?= htmlspecialchars($event['title']) ?>" class="card-image">
                            <p class="permbajtja"><?= htmlspecialchars($event['description']) ?></p>
                            <h2 class="titulli"><?= htmlspecialchars($event['title']) ?></h2>
                        </a>
                    </li>
                <?php
                    endforeach;
                else:
                    echo "<li>No events found.</li>";
                endif;
                ?>
            </ul>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="Script-slider.js"></script>

<!--team-->
<h2>MEET OUR TEAM</h2>
<div class="team-container">
    <?php if (!empty($staffMembers)): ?>
        <?php foreach ($staffMembers as $staff): ?>
            <div class="team-card">
                <img src="<?= isset($staff['Photo']) ? $staff['Photo'] : 'default.jpg' ?>" alt="<?= $staff['Name'] ?>">
                <h3><?= htmlspecialchars($staff['Name']) ?></h3>
                <p class="role"><?= htmlspecialchars($staff['Role']) ?></p>
                <div class="card-details">
                    <p><?= htmlspecialchars($staff['Description']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nuk ka të dhëna për stafin.</p>
    <?php endif; ?>
</div>

        <!--ka me pas hala modifikime-->
        <section class="join-team-section">
            <h2>Join Our Team</h2>
            <p>Become part of our exceptional team and help create unforgettable events!</p>
            <p>If you are passionate about event planning and want to be part of a creative and dynamic team, we would love to hear from you.</p>
            <a href="applyform.php" class="join-team-button">Apply Now</a>
        </section>

        <!-- Client Choose us -->
        <div class="section">
            <h2>Why Do Our Clients Choose Us?</h2>
            <ul class="client-choices">
                <li>We Listen – Every event begins by carefully listening to your dreams and desires.</li>
                <li>We Adapt – Every event is unique, and we tailor it to your vision to create a personalized experience.</li>
                <li>We Deliver – From concept to execution, we ensure every detail exceeds your expectations.</li>
            </ul>
        </div>

        <!-- Call to Action -->
        <div class="cta">
            <p>Choose to create memories, not just hold events.</p>
            <a href="ContactUs.php">Contact Us Today</a>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3 class="footer-title">Eventopin</h3>
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
            <p>2024 Eventopin. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
