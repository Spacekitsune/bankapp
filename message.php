<?php
$page_title='Transakcija sėkminga';
require ('header.php');
require ('inc/functions.php');

$show_db = dbfile('db/userid.json');

foreach ($show_db as $index => $value) {
    foreach ($value as $kindex => $kvalue) {
        if ($_GET['select-user-acc'] == $kvalue and $kindex == 'bank-no') {

            $new_array=[];
            $new_array=$value;

            echo 'Suma pridėta prie sąskaitos <br/>';
            echo 'Vardas Pavardė: '.$new_array['first-name'].' '.$new_array['last-name'].'<br/>';
            echo 'Sąskaita: '.$new_array['bank-no'].'<br/>';
            echo 'Likutis: '.$new_array['balance'].'<br/>';

        }
    }
}


require ('footer.php');