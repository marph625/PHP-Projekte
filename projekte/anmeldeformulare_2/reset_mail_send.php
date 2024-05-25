<?php

    require "init.php";
    include "mail.php";

    // Datenbankverbindung wird hergestellt
    $db = new DB();

    if (isset($_POST['reset'])) {
        $email = $_POST['email'];

        // Zufällige Zahl wird in einen 128-bit Hashwert umgerechnet
        $reset_token = md5(rand());

        // Query wird definiert und über Datenbankverbindung vorbereitet
        // Wenn das Statement ausgeführt wird, werden Daten aus der execute-Funktion anstelle der '?' eingefügt
        $query = "UPDATE users SET reset_token = ? WHERE email = ?";
        $stmt = $db->con->prepare($query);

        // Wenn die Ausführung des Queries klappt, wird ein reset-link erstellt
        // und per send_mail-Funktion aus mail.php (PHP-Mailer) an die übergebene email-Adresse verschickt 
        if ($stmt->execute([$reset_token, $email])) {
            $reset_link = "http://localhost/marph/php/projekte/anmeldeformulare_2/reset_pw.php";
            $reset_link .= '?email=' . $email;
            $reset_link .= '&reset_token=' . $reset_token;
            if (send_mail($email, 'Reset Password', "Testmail mit reset-link: ".$reset_link)) {
                echo "E-Mail verschickt!";
            }
        } 
    }
    
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passwort zurücksetzen</title>
    <link rel="stylesheet" href="styles_2/style_2.css">
</head>

<body>
    <?php include "header.php" ?><br>
    <h1>Passwort zurücksetzen</h1>
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
            <input id="button" type="submit" value="Senden" name="reset">
        </form>
    </div>
</body>

</html>