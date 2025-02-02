<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>
            alert('Ju duhet të jeni të loguar për të shtuar  Eventin tuaj.');
            window.location.href = 'Events.php';
          </script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" href="Addevents.css">
</head>
<body>
    <main class="main-container">
        <section class="form-section">
            <h2>Add a New Event</h2>
            <form action="Eventhandler.php" method="POST" enctype="multipart/form-data" class="event-form">
                
                <div class="form-group">
                    <label for="event-title">Event Title</label>
                    <input type="text" id="event-title" name="event-title" required>
                </div>

                <div class="form-group">
                    <label for="event-date">Event Date</label>
                    <input type="date" id="event-date" name="event-date" required>
                </div>

                <div class="form-group">
                    <label for="event-time">Event Time</label>
                    <input type="time" id="event-time" name="event-time" required>
                </div>

                <div class="form-group">
                    <label for="event-location">Event Location</label>
                    <input type="text" id="event-location" name="event-location" required>
                </div>

                <div class="form-group">
                    <label for="event-description">Event Description</label>
                    <textarea id="event-description" name="event-description" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="event-image">Event Image</label>
                    <input type="file" id="event-image" name="event-image" accept="image/*">
                </div>

                <button type="submit" class="submit-button">Add Event</button>

            </form>
        </section>
    </main>
</body>
</html>
