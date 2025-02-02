<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>
            alert('Ju duhet të jeni të loguar për të porositur Eventin tuaj.');
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
    <title>Manage Your Event</title>
    <link rel="stylesheet" href="Manage.css">
</head>
<body>
    <div class="container">
        <h1>Manage Your Event</h1>
        <form action="manage_form_handler.php" method="POST">
        
        <!-- Your Personal Information -->
        <div class="guest-details">
            <h2>Your Personal Information</h2>
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="name" required>
            </div>
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="surname" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone-number">Phone Number</label>
                <input type="tel" id="phone-number" name="phone" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" required>
            </div>
        </div>
        
        <!-- Event Details -->
        <div class="event-details">
            <h2>Event Details</h2>
            <div class="form-group">
                <label for="event-name">Event Name</label>
                <input type="text" id="event-name" name="event_name" required>
            </div>
            <div class="form-group">
                <label for="event-date">Event Date</label>
                <input type="date" id="event-date" name="event_date" required>
            </div>
            <div class="form-group">
                <label for="start-time">Start Time</label>
                <input type="time" id="start-time" name="start_time" required>
            </div>
            <div class="form-group">
                <label for="end-time">End Time</label>
                <input type="time" id="end-time" name="end_time" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="event-preference">Event Preference</label>
                <select id="event-preference" name="event_preferences" required>
                    <option>Birthday</option>
                    <option>Wedding</option>
                    <option>Graduation</option>
                    <option>Seminar</option>
                    <option>Conference</option>
                    <option>Private Party</option>
                    <option>Other</option>
                </select>
            </div>
        </div>
        
        <!-- Number of Attendees -->
        <div class="attendees">
            <h2>Number of Attendees</h2>
            <div class="form-group">
                <label for="attendees">Number of Attendees</label>
                <input type="number" id="attendees" name="attendees" required>
            </div>
        </div>
        
        <!-- Estimated Budget -->
        <div class="estimated-budget">
            <h2>Estimated Budget</h2>
            <div class="form-group">
                <label for="budget">Enter Your Budget</label>
                <input type="number" id="budget" name="budget" required>
            </div>
        </div>

        <!-- Special Requests -->
        <div class="special-requests">
            <h2>Special Requests</h2>
            <textarea rows="4" name="special_requests" placeholder="Add your requests here..."></textarea>
        </div>
        
        <!-- Payment Confirmation -->
        <div class="payment-confirmation">
            <h2>Payment and Confirmation</h2>
            <div class="form-group">
                <label for="card-type">Choose card type</label>
                <select id="card-type" name="card_type" required>
                    <option>Visa</option>
                    <option>MasterCard</option>
                </select>
            </div>
            <div class="form-group">
                <label for="card-number">Card Number</label>
                <input type="text" id="card-number" name="card_number" required>
            </div>
            <div class="form-group">
                <label for="card-expiry">Card Expiry</label>
                <input type="text" id="card-expiry" name="card_expiry" required>
            </div>
            <div class="form-group">
                <label><input type="checkbox" name="terms_and_conditions" required> I agree to the <a href="#">Terms and Conditions</a> and understand the cancellation policy.</label>
            </div>
            <div class="payment-summary">
                <p>Event Price: <strong>...</strong></p>
            </div>
        </div>
        
        <button type="submit" class="btn">Book this event</button>
    </form>
    </div>  
</body>
</html>
