<!-- Novigation meny and admin or user panel after aftorization -->

<!-- It is called only on the home page -->

<header id="header" class="p-3 bg-dark text-white">

<div class="container">

    <?php require 'template/novigation_meny.php'; ?>         <!-- novigation meny -->

    <?php
        if($_COOKIE['user'] == ''):
    ?>

    <div >
        <form class="line_one" action="#popup" method="get">
            <button type="submit" class="button__form">Login</button>
        </form>

        <form class="line_one" action="#popup1" method="get">
            <button type="submit" class="button__form__exit">Sign-up</button>
        </form>
    </div>

    <?php else: ?>

    <?php
        if($_COOKIE['user'] == 'admin'):
    ?>

    <div >
        <form class="line_one" method="get" action="./admin/admin.php">
            <button type="submit" class="button__form">Admin panel</button>
        </form>
    </div>
            
    <?php endif;?>

    <p class="user_name"> <?=$_COOKIE['user']?> </p>

    <div>
        <form class="line_one" action="./validation-form/exit.php" method="get">
            <button type="submit" class="button__form__exit">Exit</button>
        </form>
    </div>
</div>
<?php endif;?>
</header>
