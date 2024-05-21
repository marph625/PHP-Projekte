<?php
session_start();

include("verbindung.php");
include("funktionen.php");

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projektwebsite</title>
    <style>
    body {
        background-color: lightgrey;
    }
    </style>
</head>

<body>
    <a href="abmelden.php">Abmelden</a>
    <center>
        <h1>Dies ist die Index-Seite für angemeldete Nutzer</h1>
    </center>

    <br>
    <center>
        <h2>
            Hallo, <?php echo $user_data['benutzer_name'] ?>
        </h2>
    </center>

</body>

</html>