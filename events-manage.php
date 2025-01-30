<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <link rel="stylesheet" href="events-manage.css">
</head>
<body>

<header>
    <div class="header-logo">
        <img src="logoEventopia.png" alt="Logo">
    </div>
    <nav>
        <ul>
            <li><a href="Dashboard.php">Dashboard</a></li>
           
        </ul>
    </nav>
</header>

<div class="main-container">
    <h2>Manage Your Events</h2>
    <div class="events-container">
        <!-- Tabela ku do të shfaqen ngjarjet -->
        <table>
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               
                <tr>
                    <td>Technology Expo</td>
                    <td>2025-07-15</td>
                    <td>San Francisco</td>
                    <td>An expo showcasing the latest advancements in technology and innovations.</td>
                    <td>
                        <a href="edit_event.php?id=1">Edit</a> | 
                        <a href="delete_event.php?id=1">Delete</a>
                    </td>
                </tr>
                <!-- Për më shumë ngjarje, mund të shtohen dinamikisht nga databaza -->
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
