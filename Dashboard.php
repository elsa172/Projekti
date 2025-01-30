
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
        <a  href="Homepage.php"><button>Log out</button></a>

    </div>
    </header>
    <div class="dashboard-container">
        <aside class="dashboard-sidebar">
            <h2>Eventopia Admin</h2>
            <ul class="sidebar-menu">
                <li><a href="events-manage.php">Add Events</a></li>
                <li><a href="users-manage.php">Manage Users</a></li>
                <li><a href="reviews-manage.php">Add Reviews</a></li>
            </ul>
        </aside>

        <div class="dashboard-content">
            <header class="dashboard-header">
                <h1>Admin Dashboard</h1>
            </header>

            <main class="dashboard-main">
                <section id="add-events" class="section">
                    <h2>Add Events</h2>
                    <a href="events-manage.php"><button class="btn">Add New Event</button></a>
                </section>

                <section id="manage-users" class="section">
                    <h2>Manage Users</h2>
                   <a href="users-manage.php"> <button class="btn">View Users</button></a>
                </section>

                <section id="add-reviews" class="section">
                    <h2>Add Reviews</h2>
                    <a href="reviews-manage.php"><button class="btn">Add Reviews</button></a>
                </section>
            </main>
        </div>
    </div>
</body>
</html>