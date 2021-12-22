<?php

require('functions.php');
$link_db = 'db/userid.json';

if (isset($_POST['user']['create-acc'])) {

    $first_name = $_POST['user']['first-name'];
    $last_name = $_POST['user']['last-name'];
    $user_id = $_POST['user']['user-id'];



    if (empty($first_name) or empty($last_name) or empty($user_id)) {
        echo 'Užpildykite visus laukelius<br/>';
//        exit();
    } else if (strlen($first_name) < 3) {
        echo 'Toks vartotojo vardas negalimas<br/>';
//        exit();
    } else if (strlen($last_name) < 3) {
        echo 'Tokia vartotojo pavardė negalima<br/>';
//        exit();
    } else if (id_exists($user_id, $link_db)) {
        echo 'Toks asmens kodas jau egzistuoja<br/>';
//        exit();
    } else {



        $_POST['user']['bank-no'] = $bank_acc_no;
        $_POST['user']['balance'] = (int)0;

        if (dbwrite($_POST['user'], $link_db)) {
            header('Location: list.php?signup=success');
        };


    }
}


//$show_db = dbfile('db/userid.json');
//echo '<pre>';
//print_r($show_db);