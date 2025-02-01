<?php


include_once 'Database.php';
include_once 'Event.php';

$database = new Database();
$db = $database->getConnection();

$event = new Event($db);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $event_id = filter_var(trim($_GET['id']), FILTER_VALIDATE_INT);

        if ($event_id === false) {
            echo "<script>
                    alert('Gabim: ID e pavlefshme!');
                    window.location.href = 'events-manage.php';
                  </script>";
            exit;
        }

        if ($event->addToCurrent($event_id)) {
            echo "<script>
                    alert('Eventi u shtua në eventetaktuale me sukses!');
                    window.location.href = 'events-manage.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gabim gjatë shtimit të eventit në eventetaktuale!');
                    window.location.href = 'events-manage.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Gabim: ID e eventit mungon!');
                window.location.href = 'events-manage.php';
              </script>";
    }
}
?>