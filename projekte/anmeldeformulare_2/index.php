<?php
    require "init.php";
    check_login();
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Seite</title>
    <link rel="stylesheet" href="styles_2/style_2.css">
</head>

<body>
    <?php include "header.php" ?><br>
    <h1>Dies ist die Startseite</h1>
    <hr>
    <h2>
        Hallo, <?php echo $_SESSION['hashed_user'] ?>
    </h2>
</body>

</html>