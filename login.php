<?php
$page_title='Prisijungimas';
require ('header.php');
if ( isset($_SESSION['username']) ) {
    header('Location: index.php');
} else {
    echo '
<h1>Prašome prisijungti:</h1>
<form method="post" action="inc/login.inc.php">
<label>Vartotojo vardas:</label>
<input type="text" name="username">
<form method="post" action="inc/login.inc.php">
<label>Slaptažodis:</label>
<input type="password" name="password">
<input type="submit" name="login-submit" value="Prisijungti">
</form>
';
}
require ('footer.php');