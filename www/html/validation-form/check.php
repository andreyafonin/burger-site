<?php

require_once 'validation.php';
require_once '../db/connect.php';


function is_user_excist($mysql, $email) {
    $check_email = $mysql->query("SELECT id FROM `users` WHERE email = '$email'");
    // is_null
    if (mysqli_num_rows($check_email) > 0) {
        return True;
    }
    return False;
}

function add_user($mysql, $email, $name, $password) {

    $password = md5($password."soap2015");

    $result = $mysql->query("INSERT INTO `users` (name, email, password) VALUES ('$name', '$email', '$password')");
    if ($result === false) {
        printf("Query failed: %s\n", $mysql -> error);
        exit();
    }
}

session_start();

/*
trim(str) - функция удаляет личние пробелы в поле (убирает пробелы перед и после вводимых данных).
strip_tags(str) - функция удаляет теги и потенциально опасные символы из инпутов.
*/

$name = strip_tags(filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING));
$email = strip_tags(filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING));
$pass = strip_tags(filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING));
$pass__confirm = strip_tags(filter_var(trim($_POST['pass__confirm']), FILTER_SANITIZE_STRING));

$mysql = connect_to_db();

if (is_user_excist($mysql, $email)) {
    $_SESSION['message'] = 'User with such an email already registered';
    header('Location: /index.php#popup1');
    die();
}

$err = check_email($email);
if (!empty($err)) {
    $_SESSION['message'] = $err;
    header('Location: /index.php#popup1');
    die();
}

$err = check_name($name);
if (!empty($err)) {
    $_SESSION['message'] = $err;
    header('Location: /index.php#popup1');
    die();
}

$err = check_password($pass);
if (!empty($err)) {
    $_SESSION['message'] = $err;
    header('Location: /index.php#popup1');
    die();
}

if ($pass != $pass__confirm) {
    $_SESSION['message'] = 'Different passwords. Please try again!';
    header('Location: /index.php#popup1');
    die();
}     

add_user($mysql, $email, $name, $pass);

$_SESSION['message'] = 'Welcome!';
header('Location: /index.php#popup');

$mysql->close();

?>
