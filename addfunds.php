<?php

require ('header.php');
require ('inc/functions.php');

$page_title='Papildyti sąskaitą';

$show_db = dbfile('db/userid.json');
foreach ($show_db as $index => $value) {
    foreach ($value as $kindex => $kvalue) {
        if ( $_GET['action']==$kvalue AND $kindex=='bank-no') {
            $new_array=[];
            $new_array=$show_db[$index];
        }
    }
}
echo '<pre>';
print_r($new_array);

?>
    <h1>Papildyti sąskaitą</h1>
<?php

require ('footer.php');