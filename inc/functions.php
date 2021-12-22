<?php

// Open json file as array

function dbfile($link) {
//    $file=fopen($link,'r');
//    $json=fread($file,filesize($link));
//    fclose($file);
//    $json=json_decode($json,true);
    $json=file_get_contents($link);
    $json=json_decode($json, true);
    return $json;
}

// Add to json file

function dbwrite($array, $link) {
    $old_array = dbfile($link);
    $old_array[]=$array;
    $json = json_encode($old_array);
    $file = fopen($link, 'w+');
    if (fwrite($file, $json)) {
        return true;
    }
}

//  Make a change to json file

function dbchange ($array, $link) {

}



// Check is user-id authentic

function id_exists($id, $link) {
    $array=dbfile($link);
    foreach ($array as $index => $value) {
        foreach ($value as $kindex => $kvalue) {
            if ( $kindex == 'user-id' AND $kvalue==$id ) {
                return true;
            }
        }
    }
}

// Create new bank account no

function new_acc_no(){
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $new_acc_np = '';
        for ($i = 0; $i < 18; $i++) {
            $new_acc_np .= $characters[rand(0, $charactersLength - 1)];
        }
    return 'LT'.$new_acc_np;

}

// Check bank account authenticity

function acc_no_exists($no, $link) {
    $array=dbfile($link);
    foreach ($array as $index => $value) {
        foreach ($value as $kindex => $kvalue) {
            if ( $kindex == 'bank-no' AND $kvalue==$no ) {
                return true;
            }
        }
    }
}

