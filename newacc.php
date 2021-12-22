<?php
$page_title='Sukurti naują sąskaitą';
require ('header.php');
require ('inc/newacc.inc.php');


$bank_acc_no='';
while (true) {
    $bank_acc_no = new_acc_no();
    if (!acc_no_exists($bank_acc_no, $link_db)) {
        break;
    }
}




?>
    <h1>Sukurti naują sąskaitą</h1>

    <form method="POST" action="">

        <label>Vardas:</label>
        <input type="text" name="user[first-name]"><br/>

        <label>Pavardė:</label>
        <input type="text" name="user[last-name]"><br/>

        <label>Asmens kodas:</label>
        <input type="text" name="user[user-id]"><br/>

        <label>Banko sąskaita:</label>
        <input type="text" name="bank-no" value="<?php echo $bank_acc_no; ?>" readonly><br/>

        <input type="submit" name="user[create-acc]" value="Sukurti naują sąskaitą">

    </form>

<?php



require ('footer.php');