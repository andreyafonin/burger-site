<?php
    session_start();
?>

<!DOCTYPE html>
<html lang = "ru">

<?php require 'template/head.php'; ?>           <!-- HEAD -->

<body>

<!-- -------------------- -->

<?php require 'template/header_main.php'; ?>    <!-- HEADER -->

<!-- -------------------- -->

<?php
    require_once 'db/connect.php';
    
    $mysql = connect_to_db();
    $show_all = $mysql->query("SELECT * FROM `good`");

    for ($i=0; $i < mysqli_num_rows($show_all); $i++) { 

        $user = mysqli_fetch_assoc($show_all);

        $_SESSION['pic'] = [
            "picture" => '../' . $user['picture'],
            "name_product" => $user['name_product'],
            "description" => $user['description'],
            "price" => $user['price']
        ];
 ?>
 
<form style="   display: inline-block; 
                width: 30%; 
                background-color: #979c97; 
                margin-top: 30px; 
                border-radius: 15px; 
                margin-left: 20px;
                margin-right: auto" class="container" method="get" action="/admin/delet_products.php">

    <div class="product_form">

        <div class="picture_form">
            <img src="<?= $_SESSION['pic']['picture'] ?>" alt="" class="picture_form">
        </div>
        <div>
            <h2 class="name_form"> <?= $_SESSION['pic']['name_product'] ?></h2>   
        </div>
        <div class="description_form">
            <h4> <?= $_SESSION['pic']['description'] ?></h2>
        </div>
        <div class="price_form">
            <h3> <?= $_SESSION['pic']['price'] ?> rubles</h2>
        </div>

    </div>
</form>

<?php } ?>

<!-- -------------------- -->

<?php require 'template/popup.php'; ?>           <!-- POPUP -->

</body>
</html>
