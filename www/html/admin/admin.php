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

<main>
    <div class="container">
        <div class="content" style="padding: 30px">
        <h2>LIST OF PRODUCTS</h2>

<!-- style for table -->
        
        <style>
            th, td {
                padding: 7px;
            }
            th {
                background: #606060;
                color: white;
            }
            td {
                background: #b5b5b5;
            } 
        </style>

        <table>
            <br>
            <tr>
<!--                 <th>ID</th> -->
                <th>name_product</th>
                <th>description</th>
                <th>price</th>
            </tr>

            <?php
                require_once '../db/connect.php';

                $mysql = connect_to_db();
                $show_products = $mysql->query("SELECT * FROM `good`");
                $show_products = mysqli_fetch_all($show_products);
                foreach ($show_products as $show_products) {
            ?>
                        <tr>
<!--                             <td><?= $show_products[0] ?></td> -->
                            <td><?= $show_products[2] ?></td>
                            <td><?= $show_products[3] ?></td>
                            <td><?= $show_products[4] ?></td>
                            <td><a style="color: blue" href="update_product.php?id=<?=$show_products[0]?>"> Upload </a></td>
                            <td><a style="color: red" href="delet_products.php?id=<?=$show_products[0]?>"> Delete </a></td>
                        </tr>
            <?php
                }
            ?>    
        </table> 
        </div>
    </div>
    
    </div> 
        <div class="sidebar" style="padding: 30px">
            <form class="popup__form " action="product.php" method="post" enctype="multipart/form-data">
                <h2>ADD NEW PRODUCT</h2>
                <div class="content">
                    <div class="content">
                        <label>Download image</label>
                        <input type="file" name="photo">
                    </div>
                    <div class="sidebar">
                        <label>Enter product name</label>   
                        <input type="text" class="form__control" name="name_product" id="name_product" placeholder="Enter product name" tabindex="1"><br>
                        <label>Enter the price</label> 
                        <input type="text" class="form__control" name="price" id="price" placeholder="Enter the price for product" tabindex="2">
                    </div>
                </div>

                <div>
                    <textarea maxlength="10000" type="text" class="form__text" name="description" id="description" placeholder="Description of the product" tabindex="2"></textarea>
                </div>

                <button class="button__form" type="submit">Upload</button>
            
            </form>


<!-- walidation form for the add products -->
            <?php
                if($_SESSION['message']){
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';       //TO DO: add walidation
                }
                unset($_SESSION['message']);
            ?>     
<!-- walidation form for the add products -->
        </div>
   </div>
</main>

<!-- -------------------- -->

</div>
</body>
</html>
