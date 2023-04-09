<?php

session_start();

if ($_COOKIE['user'] != 'admin') {
    header('Location: ../index.php');
}

require_once '../db/connect.php';

function upload_product($tmp_name, $name, $price, $name_product, $description) {

    $price = strip_tags(filter_var(trim($_POST['price']), FILTER_SANITIZE_STRING));
    $name_product = strip_tags(filter_var(trim($_POST['name_product']), FILTER_SANITIZE_STRING));
    $description = strip_tags(filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING));

    $mysql = connect_to_db();

    $path = 'uploads/' . time() . $name;
    if (!move_uploaded_file($tmp_name, '../' . $path)) {
        // $_SESSION['message'] = 'Ошибка при загрузке сообщения';
    }

    // $result = $mysql->query("INSERT INTO `good` (`picture`) VALUES ('$path')");
    $result = $mysql->query("INSERT INTO `good` (picture, name_product, description, price) VALUES ('$path', '$name_product', '$description', '$price')");
    print mysqli_error($mysql);
}
