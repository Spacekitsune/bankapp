<?php
$page_title = 'Papildyti sąskaitą';
require('header.php');
require('inc/functions.php');

$show_db = dbfile('db/userid.json');
?>
    <h1>Papildyti sąskaitą</h1>
<?php

// DIRECT FROM LIST.PHP PAGE

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $show_db = dbfile('db/userid.json');

    foreach ($show_db as $index => $value) {
        foreach ($value as $kindex => $kvalue) {
            if ($_GET['action'] == $kvalue and $kindex == 'bank-no') {

                $new_array = [];
                $new_array = $value;

                echo 'Suma pridėta prie sąskaitos <br/>';
                echo 'Vardas Pavardė: ' . $new_array['first-name'] . ' ' . $new_array['last-name'] . '<br/>';
                echo 'Sąskaita: ' . $new_array['bank-no'] . '<br/>';
                echo 'Likutis: ' . $new_array['balance'] . '<br/>';

            }
        }
    }


    ?>
    <form method="get" action="">
        <label for="">Suma, kuria norite papildyti sąskaitą</label>
        <input type="hidden" name="action" value="<?php echo $action; ?>">
        <input type="number" name="amount">
        <input type="submit" name="submit-amount">
    </form>
    <?php
    if (isset($_GET['submit-amount'])) {

        foreach ($show_db as $index => $value) {
            foreach ($value as $kindex => $kvalue) {
                if ($_GET['action'] == $kvalue and $kindex == 'bank-no') {
                    if ($_GET['amount'] > 0) {

                        $show_db[$index]['balance'] += (int)$_GET['amount'];

                        $show_db = json_encode($show_db);
                        if (file_put_contents('db/userid.json', $show_db)) {
                            header("Location: message.php?select-user-acc=$kvalue");
                        }


                    } else {
                        echo 'neteisingai įrašėte sumą';
                    }
                }
            }
        }


    }


} else {

// DIRECT FROM ADDFUNDS.PHP LINK IN INDEX.PHP MENU

    echo '
    <form action="" method="get" id="user-select">
    <label >Pasirinkite sąskaitos savininką:</label>
    <select form="user-select" name="select-user-acc">
        <option >Select</option>
        ';
    foreach ($show_db as $index => $value) {
        echo '
        <option
       value="' . $show_db[$index]['bank-no'] . '">' . $show_db[$index]['first-name'] . ' ' . $show_db[$index]['last-name'] . ' ' . $show_db[$index]['bank-no'] . ' ' . $show_db[$index]['balance'] . ' EUR</option>
        ';
    }
    echo '
    </select>
    <label for="">Suma, kuria norite papildyti sąskaitą</label>
    <input type="number" name="amount">
    <input type="submit" name="submit-amount">
    </form>
    ';

    if (isset($_GET['submit-amount'])) {

        foreach ($show_db as $index => $value) {
            foreach ($value as $kindex => $kvalue) {
                if ($_GET['select-user-acc'] == $kvalue and $kindex == 'bank-no') {
                    if ($_GET['amount'] > 0) {

                        $show_db[$index]['balance'] += (int)$_GET['amount'];

                        $show_db = json_encode($show_db);
                        if (file_put_contents('db/userid.json', $show_db)) {
                            header("Location: message.php?select-user-acc=$kvalue");
                        }


                    } else {
                        echo 'neteisingai įrašėte sumą';
                    }
                }
            }
        }


    }


}

require('footer.php');