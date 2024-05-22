<?php
require "init.php";

if (count($_POST) > 0) {
    // Wenn etwas über Post übergeben wurde

    $User = new User();
    $errors = $User->create($_POST);

    if (is_array($errors) && count($errors) == 0) {
        // Wenn keine Fehler gefunden wurden, wird der Nutzer zu login.php weitergeleitet
        header("Location: login.php");
        die;
    }
}

?>


<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Seite</title>
</head>

<body>
    <?php include "header.php" ?><br>
    <h1>Registrierung</h1>

    <form method="post">
        <?php
        if (isset($errors) && count($errors) > 0) {
            // Wenn es Fehler gibt, werden die Elemente des Arrays $errors als $error ausgegeben
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
        ?>
        <hr>
        <!--
            Ternary Operator wird benutzt, um eine kurze If-Anweisung zu realisieren.
            Wenn über $_POST Daten übergeben wurden, soll in dem Input-Feld das konkrete Datum ausgegeben werden,
            ansonsten soll es leer bleiben
        -->
        <input type="text" name="username" placeholder="Benutzername"
            value="<?= isset($_POST['username']) ? $_POST['username'] : ''; ?>"><br>
        <input type="email" name="email" placeholder="Email"
            value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>"><br>
        <input type="text" name="password" placeholder="Passwort"
            value="<?= isset($_POST['password']) ? $_POST['password'] : ''; ?>"><br>
        <input type="submit" value="Registrieren">
    </form>
</body>

</html>