<?php
require_once "aplikimet_lidhja.php";
$aplikimi = new Aplikimi();
$applications = $aplikimi->getApplications();

$aplikimi = new Aplikimi();

$applications = $aplikimi->getApplications();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Aplikimet</title>
    <link rel="stylesheet" href="adminAplikimet.css">
</head>
<body>
<header>
    <div class="header-logo">
        <img src="logoEventopia.png" alt="Logo">
    </div>
    <nav>
        <ul>
            <li><a href="adminDashboard.php">Dashboard</a></li>
        </ul>
    </nav>
</header>
    <div class="container">
        <h1>Job Applications</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Role</th>
                <th>Description</th>
                <th>Photo</th>
            </tr>
            <?php foreach ($applications as $app): ?>
    <tr>
    <td><?= isset($app['ID']) ? $app['ID'] : 'N/A' ?></td>
        <td><?= isset($app['Name']) ? $app['Name'] : 'N/A' ?></td>
        <td><?= isset($app['Surname']) ? $app['Surname'] : 'N/A' ?></td>
        <td><?= isset($app['Role']) ? $app['Role'] : 'N/A' ?></td>
        <td><?= isset($app['Description']) ? $app['Description'] : 'N/A' ?></td>
        <td><img src="<?= isset($app['Photo']) ? $app['Photo'] : 'default.jpg' ?>" alt="Photo" width="50"></td>
    </tr>
<?php endforeach; ?>
<h2>Shto Stafin e Ri</h2>
<form action="add.staff.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="surname" placeholder="Surname" required>
    <input type="text" name="role" placeholder="Role" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="file" name="photo" required>
    <button type="submit">Add Staff</button>
</form>



        </table>
    </div>
</body>
</html>
