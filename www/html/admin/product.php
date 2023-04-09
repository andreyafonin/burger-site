<?php
    session_start();

    if ($_COOKIE['user'] != 'admin') {
        header('Location: ../index.php');
    }
    
require_once 'upload_photo.php';

session_start();

upload_product($_FILES['photo']['tmp_name'], $_FILES['photo']['name'], $price, $name_product, $description);

header('Location: admin.php');
