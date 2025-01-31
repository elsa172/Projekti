
$user = new User($db);

$user->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: User ID not found.');


if ($user->delete()) {
    echo "User was deleted successfully.";
    header("Location: users-manage.php"); 
} else {
    echo "Unable to delete the user.";
}
?>
