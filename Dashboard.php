<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: Signin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventopia Dashboard</title>
    <link rel="stylesheet" href="Dashboard.css">
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
    <a href="Logout.php"><button>Logout</button></a>

    </div>
    </header>
    <div class="dashboard-container">
        <aside class="dashboard-sidebar">
            <h2>Eventopia Admin</h2>
            <ul class="sidebar-menu">
                <li><a href="users-manage.php">Manage Users</a></li>
                <li><a href="reviews-manage.php">Add Reviews</a></li>
                <li><a href="adminEventetaktuale.php">Events on Website</a></li>
                <li><a href="events-manage.php">Events from Clients</a></li>
                <li><a href="adminStaff.php">Add New Staff</a></li>
                <li><a href="adminMessage.php">Get Messages</a></li>
                <li><a href="adminAplikimet.php">Get New Aplications</a></li>
                <li><a href="admin.manage.klient.php">Get New Event Orders</a></li>
                <li><a href="adminSlider.php">Edit Slider</a></li>
            </ul>
        </aside>

        <div class="dashboard-content">
            <header class="dashboard-header">
                <h1>Admin Dashboard</h1>
            </header>

            <main class="dashboard-main">
                
                <section id="manage-users" class="section">
                    <h2>Manage Users</h2>
                   <a href="users-manage.php"> <button class="btn">View Users</button></a>
                </section>

                <section id="add-reviews" class="section">
                    <h2>Add Reviews</h2>
                    <a href="reviews-manage.php"><button class="btn">View Reviews</button></a>
                </section>
                <section id="add-reviews" class="section">
                    <h2>Events on Website</h2>
                    <a href="adminEventetaktuale.php"><button class="btn">View Events </button></a>
                </section>
                <section id="add-events" class="section">
                    <h2>Events from Clients</h2>
                    <a href="events-manage.php"><button class="btn">View Events</button></a>
                </section>

                <section id="add-staff" class="section">
                    <h2>Add Staff</h2>
                    <a href="adminStaff.php"><button class="btn">Add Staff or View it</button></a>
                </section>

                <section id="get-messsages" class="section">
                    <h2>Get Messages</h2>
                    <a href="adminMessage.php"><button class="btn">View Sent Messages</button></a>
                </section>

                <section id="get-aplications" class="section">
                    <h2>Get New Applications</h2>
                    <a href="adminAplikimet.php"><button class="btn">View Sent Aplication</button></a>
                </section>

                <section id="get-orders" class="section">
                    <h2>Get Event Orders</h2>
                    <a href="admin.manage.klient.php"><button class="btn">View New Orders</button></a>
                </section>

                <section id="add-slider" class="section">
                    <h2>Add New Slider</h2>
                    <a href="adminSlider.php"><button class="btn">View Sliders</button></a>
                </section>
            </main>
        </div>
    </div>
</body>
</html>