<?php

    require "init.php";

    if (count($_POST) > 0) {
        $User = new User();
        $errors = $User->login($_POST);

        if (is_array($errors) && count($errors) == 0) {
            // Wenn keine Fehler gefunden wurden, wird der Nutzer zu login.php weitergeleitet
            header("Location: index.php");
            die;
        }
    }
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Seite</title>
    <link rel="stylesheet" href="styles_2/style_2.css">
</head>

<body>
    <?php include "header.php" ?><br>
    <h1>Login</h1>
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
            <input id="text" type="email" name="email" placeholder="Email"
                value="<?php isset($_POST['email']) ? $_POST['email'] : '';?>"><br>
            <input id="text" type="password" name="password" placeholder="Passwort"
                value="<?php isset($_POST['password']) ? $_POST['password'] : '';?>"><br>
            <input id="button" type="submit" value="Einloggen">
        </form>
    </div>
</body>

</html>