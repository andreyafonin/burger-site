<?php

require_once '../validation.php';
require_once '../db/connect.php';

function is_product_excist($mysql, $name_product) {
    $check_email = $mysql->query("SELECT id FROM `goods` WHERE name_product = '$name_product'");
    // is_null
    if (mysqli_num_rows($name_product) > 0) {
        return True;
    }
    return False;
}

function add_product($mysql, $image, $price, $name_product, $description) {

    $password = md5($password."soap2015");

    $result = $mysql->query("INSERT INTO `goods` (image, price, name_product, description) VALUES ('$image', '$price', '$name_product', '$description')");
    if ($result === false) {
        printf("Query failed: %s\n", $mysql -> error);
        exit();
    }
}

session_start();

$image =
$price =
$name_product =
$description = 

?>
