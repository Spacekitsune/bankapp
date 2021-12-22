<?php
$page_title = 'Sąskaitų sąrašas';
require('header.php');
require('inc/functions.php');

$show_db = dbfile('db/userid.json');
$columns = array_column($show_db, 'last-name');
array_multisort($columns, SORT_ASC, $show_db);

if (isset($_GET['success']) and $_GET['success'] == 1) {
    echo 'Vartotojas buvo ištrintas iš sistemos';
}

echo '
    <h1>Sąskaitų sąrašas</h1>

    <table style="width: 50vw; text-align: center">
        <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Asmens kodas</th>
            <th>Saskaitos nr.</th>
            <th>Sąskaitos likutis</th>
        </tr>
        ';
for ($i = 0; $i < sizeof($show_db); $i++) {
    echo '
                <tr>
                    <td>' . $show_db[$i]["first-name"] . '</td>
                    <td>' . $show_db[$i]["last-name"] . '</td>
                    <td>' . $show_db[$i]["user-id"] . '</td>
                    <td>' . $show_db[$i]["bank-no"] . '</td>
                    <td>' . $show_db[$i]["balance"] . '</td>
                    <td><a href="addfunds.php?action=' . $show_db[$i]["bank-no"] . '">Pridėti lėšų</a></td>
                    <td><a href="sendfunds.php?action=' . $show_db[$i]["bank-no"] . '">Nuskaityti lėšas</a></td>
                    <td>
                    <form method="get" action="">
                    <input type="hidden" name="action" value="istrinti-saskaita">
                    <input type="hidden" name="account" value="' . $show_db[$i]['bank-no'] . '">
                    <input type="submit" value="Ištrinti">
                    </form>
                    </td>
                </tr>             
                ';
}
echo '
</table>
                ';

if (isset($_GET['action']) and $_GET['action'] == 'istrinti-saskaita') {

    foreach ($show_db as $index => $value) {
        foreach ($value as $kindex => $kvalue) {
            if ($_GET['account'] == $kvalue and $kindex == 'bank-no') {
                $check_balance=[];
                $check_balance=$value;
                if ( $check_balance['balance']<=0) {
                    unset($show_db[$index]);
                } else {
                    echo '<h2>Sąskaitos ištrinti negalima, nes joje yra lėšų.</h2>';
                }

            }


        }
    }
    $show_db = json_encode($show_db);
    if (file_put_contents('db/userid.json', $show_db)) {
        header_remove();
        header("Location: message.php?");
    }

}

require('footer.php');