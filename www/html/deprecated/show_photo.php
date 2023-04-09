<?php

require_once '../db/connect.php';

function show_product() {

    $mysql = connect_to_db();

    $check_photo = $mysql->query("SELECT * FROM `good`");

    if (mysqli_num_rows($check_photo) > 0) {
        $user = mysqli_fetch_assoc($check_photo);

        $_SESSION['pic'] = [
            "picture" => '../' . $user['picture'],
            "name_product" => $user['name_product'],
            "description" => $user['description'],
            "price" => $user['price']
        ];
    }
  
    header('Location: admin.php');

}
