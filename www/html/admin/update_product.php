<?php 
    require_once '../db/connect.php';
    $mysql = connect_to_db();
    $product_id = $_GET['id'];
    $show_products = $mysql->query("SELECT * FROM `good` WHERE id = '$product_id'");
    $show_products = mysqli_fetch_assoc($show_products);
 ?>

<?php
    session_start();

    if ($_COOKIE['user'] != 'admin') {
        header('Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang = "ru">

<?php require '../template/head.php'; ?>            <!-- HEAD -->

<body>
<div class="wrapper">
    
<!-- -------------------- -->

<?php require '../template/header_other.php'; ?>     <!-- HEADER -->

<!-- -------------------- -->
<style>
   .btn_one {
    display: inline-block; /* Строчно-блочный элемент */
    background: #606060; /* Серый цвет фона */
    color: #fff !important; /* Белый цвет текста */
    padding: 1rem 1.5rem; /* Поля вокруг текста */
    text-decoration: none; /* Убираем подчёркивание */
    border-radius: 3px; /* Скругляем уголки */
   }
</style>

</div> 
    <div class="sidebar" style="padding: 30px">
        <form class="popup__form" action="update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $show_products['id'] ?>">
            <h2>UPDATE PRODUCT</h2>
            <div class="content">
                <div class="content">
                    <label>Download image</label>
                    <input type="file" name="photo">
                </div>
                <div class="sidebar">
                    <label>Enter product name</label>   
                    <input type="text" class="form__control" name="name_product" id="name_product" value="<?= $show_products['name_product'] ?>" tabindex="1"><br>
                    <label>Enter the price</label> 
                    <input type="text" class="form__control" name="price" id="price" value="<?= $show_products['price'] ?>" tabindex="2">
                </div>
            </div>

            <div>
                <textarea maxlength="10000" type="text" class="form__text" name="description" id="description" tabindex="2"><?= $show_products['description'] ?></textarea>
            </div>

            <div>
                <button class="button__form" type="submit">Update</button>
                <a class="btn_one" href="admin.php">Cencel</a>
            </div>

        </form>
    </div>
</div>
