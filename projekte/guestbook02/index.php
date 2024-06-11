<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gästebuch 2</title>
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

if (isset($_POST['vorname'])) {
    $fname = $_POST['vorname'];
    $lname = $_POST['nachname'];
    $comment = $_POST['kommentar'];

    $file = fopen("comments.html", "a");
    fwrite($file,"<b> First Name </b>" . $fname . "<br>");
    fwrite($file,"<b> Last Name </b>" . $lname . "<br>");
    fwrite($file,"<b> Comment </b>" . $comment . "<br>");
    fclose($file);

}

    require("comments.html");

?>

</body>
</html>

