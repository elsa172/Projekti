<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="users-manage.css">
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

<div class="users-container">
    <h2>Manage Users</h2>
    <table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>user1</td>
            <td>user1@example.com</td>
            <td>*******</td>
            <td>
                <a href="#">Edit</a> |
                <a href="#" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
        </tr>
        <tr>
            <td>user2</td>
            <td>user2@example.com</td>
            <td>*******</td>
            <td>
                <a href="#">Edit</a> |
                <a href="#" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
        </tr>
    </tbody>
</table>
</div>

</body>
</html>
