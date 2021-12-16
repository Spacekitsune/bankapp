<?php

require ('header.php');

$page_title='Sąskaitų sąrašas';

require ('inc/functions.php');

$show_db = dbfile('db/userid.json');
?>
    <h1>Sąskaitų sąrašas</h1>

    <table style="width: 50vw; text-align: center">
        <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Asmens kodas</th>
            <th>Saskaitos nr.</th>
            <th>Sąskaitos likutis</th>
        </tr>
        <?php
        for ($i=0;$i<sizeof($show_db);$i++) {
                echo '
                <tr>
                <td>' . $show_db[$i]["first-name"] . '</td>
                <td>' . $show_db[$i]["last-name"] . '</td>
                <td>' . $show_db[$i]["user-id"] . '</td>
                <td>' . $show_db[$i]["bank-no"] . '</td>
                <td>' . $show_db[$i]["balance"] . '</td>
                </tr>
                ';
        }
        ?>
    </table>
<?php




echo '<pre>';
print_r($show_db);

require ('footer.php');