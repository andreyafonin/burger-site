<!-- User Registration and Authorization menu implemented as popup -->

<!-- popup is called only on the home page -->

<?php
    if($_COOKIE['user'] == '') {
?>

<div id="popup" class="popup">
    <a href="#header" class="popup__area"></a>
    <div class="popup__body">
        <div class="popup__content">
            <h1>authorization form</h1>
            <a href="#header" class="popup__close"> X </a>
            <form class="popup__form" action="/validation-form/auth.php" method="post">
                <label>Login</label>   
                <input type="text" class="form__control" name="email" id="email" placeholder="Enter email" tabindex="1">
                <label>Password</label>
                <input type="password" class="form__control" name="pass" id="pass" placeholder="Enter password" tabindex="2">
                <p>
                    <button class="button__form" type="submit"> Login </button> 
                    <label class="reg__text">First time here? - <a  href="#popup1">Sign up</a></label>
                </p>
                <?php
                    if($_SESSION['message']){
                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                    }
                    // unset($_SESSION['message']);
                ?>
            </form>
        </div>
    </div>
</div>
<div id="popup1" class="popup">
    <a href="#header" class="popup__area"></a>
    <div class="popup__body">
        <div class="popup__content">
            <h1>registration form</h1>
            <a href="#header" class="popup__close"> X </a>
            <form class="popup__form" action="/validation-form/check.php" method="post">
                <label>Enter your name</label>   
                <input type="text" class="form__control" name="name" id="name" placeholder="Enter your name" tabindex="1"><br>
                <label>Enter your email</label> 
                <input type="text" class="form__control" name="email" id="email" placeholder="Enter email" tabindex="2"><br>
                <label>Enter your password</label> 
                <input type="password" class="form__control" name="pass" id="pass" placeholder="Enter password" tabindex="3"><br>
                <label>Repeat your password</label> 
                <input type="password" class="form__control" name="pass__confirm" id="pass__confirm" placeholder="Enter password again" tabindex="4"><br>
                <p>
                    <button class="button__form" type="submit"> Sign-up </button>
                    <label class="reg__text">Have already been registered? - <a  href="#popup">Login</a></label>
                </p>
                <?php
                    if($_SESSION['message']){
                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                    }
                    unset($_SESSION['message']);
                ?>
            </form>
        </div>
    </div>
</div>

<?php } ?>
