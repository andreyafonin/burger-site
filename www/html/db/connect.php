<?php

function connect_to_db() {

    $host = 'db';
    $name = 'root';
    $password = '1234';
    $db = 'register-bd';

    $mysql = new mysqli($host, $name, $password, $db);
    if ($mysql->connect_errno) {
        printf("Connect failed: %s\n", $mysql->connect_error);
        exit();
    }
    return $mysql;
}

?>
