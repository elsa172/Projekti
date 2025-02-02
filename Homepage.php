<?php
require_once 'Database.php';
require_once 'Review.php';

$db = new Database();
$conn = $db->getConnection(); 

$reviewObj = new Review($conn);
$reviews = $reviewObj->getReviews(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventopia</title>
    <link rel="stylesheet" href="Homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Linking google fonts for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_forward" />
    <!-- Linking SwiperJS CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
      <!-- Linking Remix icon for Reviews-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
        </ul>
    </nav>
    <div class="nav-butonat">
        <a  href="Signin.php"><button>Login</button></a>
        <a  href="Signup.php"><button>Sign Up</button></a>
    </div>
    </header>
    <section class="home">
        
        <div class="action2">
        <div class="contenti-home">
        <h3>Welcome to Eventopia</h3>
        <h1>Your Local Event Management Partner!</h1>
        <p>At Eventopia, we turn your ideas into unforgettable experiences.
             From intimate gatherings to grand celebrations, we specialize in managing local events with precision and passion. 
             Whether it’s a wedding, corporate meeting, cultural festival, 
             or community event, our team is here to handle every detail, leaving you free to enjoy the moment.
             Let’s make it happen—together.  </p>
            </div>
            <div class="actions">
        <div class="searchbox">
            <input type="text" placeholder="Search...">
            <a href="#">
                <i class="fas fa-search"></i> 
               <!-- Ikonen search e importojna -->
                </a>
                
        </div>
        <a href="C:\Users\cakiq\OneDrive\Desktop\Projekti\Events\Events.html" class="view-more-btn">View More About Our Events</a>
    </div>
   </div>
   <!-- What we offer -->
</section>
<section class="what-we-offer">
    <div class="container">
    <h1 class="titulli">What we offer ?</h1>
    <div class="katroret">
        <div class="katrori">
            <h3>Discover Local Events</h3>
            <p>Stay informed about the latest local events in your area, from community 
                gatherings to concerts and exhibitions. Never miss an event that interests you!</p>
        </div>
        <div class="katrori">
            <h3>Job Opportunities for Events</h3>
            <p>Explore event-related job opportunities, whether you're looking for volunteer roles, part-time gigs, or full-time positions.
                 Connect with organizers who need your help!</p>
        </div>
        <div class="katrori">
            <h3>Personal Event Management</h3>
            <p>Simplify planning for your personal events like weddings, birthday parties, 
                and private celebrations. Use our tools to manage every detail effortlessly.</p>
        </div>
    </div>
 </div>
</section>

 <div class="parasliderit">
     <h1 class="titullisliderit">Don't miss out on the latest events</h1>
     <p class="paragrafi">Stay up to date with the latest happenings and never miss out on exciting opportunities! 
        We regularly host events that offer valuable insights, networking opportunities, and hands-on experiences. 
        Take a look at some of our recent events below, and be sure to explore more to stay ahead. Whether you're looking for informative workshops,
         exciting meetups, or special events, there's something for everyone. Don't let these opportunities pass you by—get
         involved and make the most of what's coming next!</p>
     
     </div>
<section class="sliders">
    <div class="container swiper">
        <div class="card-wapper">
            <ul class="card-list swiper-wrapper">
                <li class="card-item swiper-slide">
                    <a href="#" class="card-link">
                    <img src="Eventi1.jpg" alt="Nje Event" class="card-image">
                    <p class="permbajtja">Latest Event</p>
                    <h2 class="titulli">Forumi Rinor & Kulturor</h2>
                    <button class=" card-button material-symbols-rounded">arrow_forward </button>

                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="#" class="card-link">
                    <img src="Event.jpg" alt="Nje Event" class="card-image">
                    <p class="permbajtja">Latest Event</p>
                    <h2 class="titulli">Together for Nature </h2>
                    <button class=" card-button material-symbols-rounded">arrow_forward </button>

                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="#" class="card-link">
                    <img src="Eventi4.jpg" alt="Nje Event" class="card-image">
                    <p class="permbajtja">Latest Event</p>
                    <h2 class="titulli">Circus Event</h2>
                    <button class=" card-button material-symbols-rounded">arrow_forward </button>

                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="#" class="card-link">
                    <img src="Eventi5.jpg" alt="Nje Event" class="card-image">
                    <p class="permbajtja">Latest Event</p>
                    <h2 class="titulli">Teatri Kombëtar i Kosovës </h2>
                    <button class=" card-button material-symbols-rounded">arrow_forward </button>

                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="#" class="card-link">
                    <img src="Eventi2.jpg" alt="Nje Event" class="card-image">
                    <p class="permbajtja">Latest Event</p>
                    <h2 class="titulli">Film n'park</h2>
                    <button class=" card-button material-symbols-rounded">arrow_forward </button>

                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="#" class="card-link">
                    <img src="Eventi3.jpg" alt="Nje Event" class="card-image">
                    <p class="permbajtja">Latest Event</p>
                    <h2 class="titulli">Baleti Kombëtar i Kosovës</h2>
                    <button class=" card-button material-symbols-rounded">arrow_forward </button>

                    </a>
                </li>
            </ul>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
           
           </div>
    </div>
    <!-- Linking SwiperJS script for slider-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="Script-slider.js"></script>
</section> 
<section class="reviews">
        <h2>Customer Reviews</h2>
        <div class="review-list">
            <?php if ($reviews): ?>
                <?php foreach ($reviews as $review): ?>
                    <div class="review-item">
                        <?php if ($review['photo']): ?>
                            <img src="<?php echo htmlspecialchars($review['photo']); ?>" alt="User Photo">
                        <?php else: ?>
                            <img src="default-user.jpg" alt="User Photo">
                        <?php endif; ?>
                        <h3><?php echo htmlspecialchars($review['name']); ?></h3>
                        <p><?php echo nl2br(htmlspecialchars($review['review'])); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No reviews found.</p>
            <?php endif; ?>
        </div>
    </section>
    <a href="SuccessStories.html"><button>Read our success stories</button></a>
    <section class="add-review">
        <div class="container">
            <h2>Add Your Review</h2>
            <form id="reviewForm" action="add_review.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo:</label>
                    <input type="file" id="photo" name="photo">
                </div>
                <div class="form-group">
                    <label for="review">Your Review:</label>
                    <textarea id="review" name="review" rows="4" required></textarea>
                </div>
                <button type="submit" class="submit-button">Submit Review</button>
            </form>
            </div>
            </section>

            <script>
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const review = document.getElementById('review').value;

    const newReview = document.createElement('div');
    newReview.classList.add('card');
    newReview.innerHTML = `
        <img src="default-user.jpg" alt="User">
        <div class="card-content">
            <span><i class="ri-double-quotes-l"></i></span>
            <div class="card-details">
                <p>${review}</p>
                <h4>${name}</h4>
            </div>
        </div>
    `;

    document.querySelector('.container-djathtas').appendChild(newReview);


    document.getElementById('reviewForm').reset();});
</script>
        </div>
      
       
  </section>
    
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