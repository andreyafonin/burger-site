<?php 
session_start();

if ($_COOKIE['user'] != 'admin') {
    header('Location: ../index.php');
}

require_once '../db/connect.php';

$mysql = connect_to_db();

$id = $_GET['id'];

$mysql->query("DELETE FROM `good` WHERE `good`.`id` = '$id'");

// mysqli_query($mysql, "DELETE FROM `good` WHERE `good`.`id` = '$id'");

header('Location: admin.php');
  