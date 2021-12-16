<?php

require ('header.php');

$page_title='Sukurti naują sąskaitą';


?>
    <h1>Sukurti naują sąskaitą</h1>

    <form method="POST" action="">

        <label>Vardas:</label>
        <input type="text" name="user[first-name]">

        <label>Pavardė:</label>
        <input type="text" name="user[last-name]">

        <label>Asmens kodas:</label>
        <input type="text" name="user[user-id]">

        <input type="submit" name="user[create-acc]" value="Sukurti naują sąskaitą">

    </form>

<?php
require ('inc/newacc.inc.php');


require ('footer.php');