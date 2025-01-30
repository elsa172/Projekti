<?php
include_once 'Database.php';
include_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);


$user->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: User ID not found.');


$query = "SELECT username, email FROM user WHERE id = :id LIMIT 0,1";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $user->id);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$user->username = $row['username'];
$user->email = $row['email'];


if ($_POST) {
    $user->username = $_POST['username'];
    $user->email = $_POST['email'];

    if ($user->update()) {
        echo "User was updated successfully.";
        header("Location: users-manage.php"); 
    } else {
        echo "Unable to update the user.";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$user->id}"); ?>" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" value="<?php echo htmlspecialchars($user->username); ?>" required />
    
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($user->email); ?>" required />

    <button type="submit">Update</button>
</form>
