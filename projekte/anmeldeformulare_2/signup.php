<?php
require "init.php";

if (count($_POST) > 0) {
    // Wenn dem Array $_POST etwas übergeben wurde

    // Neues User-Objekt wird erstellt
    $User = new User();

    // Mögliche errors werden über die create-Methode der User-Klasse in einem Array gespeichert
    $errors = $User->create($_POST);

    if (is_array($errors) && count($errors) == 0) {
        // Wenn keine Fehler gefunden wurden, wird der Nutzer zu login.php weitergeleitet und die aktuelle Session wird beendet
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
    <link rel="stylesheet" href="styles_2/style_2.css">
</head>

<body>
    <?php include "header.php" ?><br>
    <h1>Registrierung</h1>
    <hr>

    <div id="box">
        <form method="post">
            <?php
        if (isset($errors) && count($errors) > 0) {
            // Wenn es Fehler gibt, werden die Elemente des Arrays $errors als $error ausgegeben
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
        ?>
            <!--
            Ternary Operator wird benutzt, um eine kurze If-Anweisung zu realisieren.
            Wenn dem $_POST Array übergeben wurden, soll in dem Input-Feld das konkrete Datum ausgegeben werden,
            ansonsten soll es leer bleiben
        -->
            <input id="text" type="text" name="username" placeholder="Benutzername"
                value="<?php isset($_POST['username']) ? $_POST['username'] : '';?>"><br>
            <input id="text" type="email" name="email" placeholder="Email"
                value="<?php isset($_POST['email']) ? $_POST['email'] : '';?>"><br>
            <input id="text" type="password" name="password" placeholder="Passwort"
                value="<?php isset($_POST['password']) ? $_POST['password'] : '';?>"><br>
            <input id="button" type="submit" value="Registrieren">
        </form>
    </div>
</body>

</html>