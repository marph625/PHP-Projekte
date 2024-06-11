<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gästebuch 1</title>
</head>
<body>
<h1>Gästebuch</h1>
<form action="index.php" method="post">
    Vorname <input type="text" name="vorname"><br>
    Nachname <input type="text" name="nachname"><br>
    Kommentar <textarea name="kommentar"></textarea><br>
    <input type="submit" value="Posten">
</form>
<hr>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vorname = htmlspecialchars($_POST['vorname'] ?? '');
    $nachname = htmlspecialchars($_POST['nachname'] ?? '');
    $kommentar = htmlspecialchars($_POST['kommentar'] ?? '');

    if (!empty($vorname) && !empty($nachname) && !empty($kommentar)) {
        $file = fopen("comments.html", "a");

        if ($file) {
            fwrite($file, "<b> Vorname </b>" . $vorname . "<br>");
            fwrite($file, "<b> Nachname </b>" . $nachname . "<br>");
            fwrite($file, "<b> Kommentar </b>" . $kommentar . "<br> <hr>");
            fclose($file);
        } else {
            echo "Fehler beim Öffnen der Datei";
        }

        if (file_exists("comments.html")) {
            include("comments.html");
        } else {
            echo "Die Datei 'comments.html' existiert nicht.";
        }
    } else {
        echo "Bitte füllen Sie alle Felder aus.";
    }
}
?>

</body>
</html>