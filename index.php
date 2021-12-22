<?php
$page_title = 'Meniu';
include('header.php');

if (isset($_SESSION['username'])) {
    echo '
<h1>Meniu</h1>
<ul>
    <li><a href="list.php">Sąskaitų sąrašas</a></li>
    <li><a href="newacc.php">Sukurti naują sąskaitą</a></li>
    <li><a href="addfunds.php">Papildyti sąskaitą</a></li>
    <li><a href="sendfunds.php">Pervesti lėšas</a></li>
    <li><a href="?action=logout">Atsijungti</a></li>
</ul>
';

    if (isset($_GET['action']) AND $_GET['action'] == 'logout') {
        session_destroy();
        header('Location: login.php?logout=success');
    }

} else {
    header('Location: login.php?login=failed');
}
require('footer.php');



