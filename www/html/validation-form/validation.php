<?php

function check_email($email) {

    if ($email === '') {
        return 'Please, enter email address';
    }

    if (mb_strlen($email) > 30){
        return 'e-mail address is too long';
    }   

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'Wrong e-mail address';
    }
    return '';
}

function check_password($password) {

    if ($password === '') {
        return 'Please, enter password';
    }
    if (mb_strlen($password) < 6) {
        return 'Password length must greater then 6 characters';
    }
    if (mb_strlen($password) > 30) {
        return 'Password length must less then 30 characters';
    }
    return '';
}

function check_name($name) {
    if($name === '') {
        return 'Please, enter name';
    }
    if (mb_strlen($name) < 3) {
        return 'User name length must greater then 3 characters';
    }
    if (mb_strlen($name) > 30) {
        return 'User name length must less then 30 characters';
    }
    return '';
}
