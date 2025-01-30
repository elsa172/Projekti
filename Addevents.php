
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Events</title>
    <link rel="stylesheet" href="Addevents.css">
</head>
<body>
    <main class="main-container">
        <section class="form-section">
          <h2>Add a New Event</h2>
          <form action="submit-event.php" method="POST" class="event-form" enctype="multipart/form-data">
            <div class="form-group">
              <label for="event-title">Event Title</label>
              <input type="text" id="event-title" name="event-title" placeholder="Enter event title" required>
            </div>
    
            <div class="form-group">
              <label for="event-date">Date</label>
              <input type="date" id="event-date" name="event-date" required>
            </div>
    
            <div class="form-group">
              <label for="event-time">Time</label>
              <input type="time" id="event-time" name="event-time" required>
            </div>
    
            <div class="form-group">
              <label for="event-location">Location</label>
              <input type="text" id="event-location" name="event-location" placeholder="Enter event location" required>
            </div>
    
            <div class="form-group">
              <label for="event-description">Description</label>
              <textarea id="event-description" name="event-description" placeholder="Enter event description" rows="5" required></textarea>
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