<?php
require_once "aplikimet_lidhja.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $role = $_POST['role'];
    $description = $_POST['description'];
    $photo = $_FILES['photo']['name'];
    
    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . $photo);
    
    $aplikimi = new Aplikimi();
    $aplikimi->addStaff($name, $surname, $role, $description, 'uploads/' . $photo);
    
    echo "<script>
            alert('Staff added successfully!');
            window.location.href = 'adminStaff.php'; // Kthehu në faqen adminStaff.php
          </script>";
}
?>