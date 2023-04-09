<?php
    session_start();

    if ($_COOKIE['user'] != 'admin') {
        header('Location: ../index.php');
    }

    require_once '../db/connect.php';
    $mysql = connect_to_db();

    $id = $_POST['id'];
    $price = strip_tags(filter_var(trim($_POST['price']), FILTER_SANITIZE_STRING));
    $name_product = strip_tags(filter_var(trim($_POST['name_product']), FILTER_SANITIZE_STRING));
    $description = strip_tags(filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING));

    $mysql->query("UPDATE `good` SET `name_product` = '$name_product', `description` = '$description', `price` = '$price' WHERE `good`.`id` = '$id'");

    header('Location: admin.php');
