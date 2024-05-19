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
</head>

<body>
    <a href="abmelden.php">Abmelden</a>
    <h1>Dies ist die Index-Seite</h1>

    <br>
    Hallo, <?php echo $user_data['benutzer_name']?>
</body>

</html>