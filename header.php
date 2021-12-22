<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page_title; ?></title>
</head>
<body>
<?php
if (isset($_SESSION['username'])) {
    echo '
    <header>
    <a href="index.php">Grįžti į meniu sąrašą</a>
    <a href="newacc.php">Grįžti į naujos sąskaitos kūrimą</a>
</header>
';
}

?>

