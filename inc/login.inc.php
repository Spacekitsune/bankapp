<?php
require('functions.php');
session_start();

if (isset($_POST['login-submit'])) {
    $login_db = dbfile('../db/login.json');

    $login_user = false;
    $login_pass = false;

    foreach ($login_db as $index => $value) {
        foreach ($value as $kindex => $kvalue) {
            if ($_POST['username'] == $kvalue and $kindex == 'username') {
                $login_user = true;
                $_SESSION['username'] = $kvalue;
            }
        }
    }

    foreach ($login_db as $index => $value) {
        foreach ($value as $kindex => $kvalue) {
            if ( md5($_POST['password']) == $kvalue and $kindex == 'password') {
                $login_pass = true;
//                $_SESSION['password'] = $kvalue;
            }
        }
    }

    if ($login_user == true and $login_pass == true) {
        header('Location: ../index.php');
    } else {
        header('Location: ../login.php?login=error');
    }
}