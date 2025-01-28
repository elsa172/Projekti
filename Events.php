<?php
session_start();

if ($_SESSION['role'] === 'admin') {
    echo "<h1>Menaxho Eventet</h1>";
    echo "<button>Shto Event</button>";
} else {
    echo "<h1>Eventet e Disponueshme</h1>";
    echo "<button>Rezervo Event</button>";
}
?>