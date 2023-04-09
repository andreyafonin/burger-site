<?php

include 'validation.php';
include '../db/connect.php';


function auth_user($mysql, $email, $password) {
    $result = $mysql->query("SELECT * FROM `users` WHERE (email = '$email' AND password = '$password')");
    if ($result === false) {
        printf("Query failed: %s\n", $mysql -> error);
        exit();
    }
    return $result->fetch_assoc();
}

session_start();

$email = strip_tags(filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING));
$pass = strip_tags(filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING));

$err = check_email($email);
if (!empty($err)) {
    $_SESSION['message'] = $err;
    header('Location: /index.php#popup');
    die();
}

$err = check_password($pass);
if (!empty($err)) {
    $_SESSION['message'] = $err;
    header('Location: /index.php#popup');
    die();
}

$pass = md5($pass."soap2015");

$mysql = connect_to_db();

$user = auth_user($mysql, $email, $pass);
if (is_null($user)) {
    $_SESSION['message'] = 'email or password error';
    header('Location: /index.php#popup');
}
else {
    setcookie('user', $user['name'], time() + 3600, "/");
    $mysql->close();
    header('Location: /index.php');
}

$mysql->close();

?>
