<?php
    $server = "localhost";
    $datenbank = "phpkursguestbook";
    $username = "root";
    $password = "";

    $link = mysqli_connect($server, $username, $password, $datenbank);

    if (!$link) {
        die("Verbindung zur Datenbank konnte nicht hergestellt werden.
            Fehler: " . mysqli_connect_error());
    }

    // Erfolgreiche Datenbankverbindung

    $db = mysqli_select_db($link, $datenbank);

    if (!$db) {
        echo "Konnte Datenbank nicht auswählen";
    }

    // Übergebene Daten werden gespeichert

    $ersteller = trim(strip_tags($_POST["ersteller"] ?? ''));
    $titel = trim(strip_tags($_POST["titel"] ?? ''));
    $beitrag = trim(strip_tags($_POST["beitrag"] ?? ''));

    if (!empty($_POST['submit'])) {
        echo "\nFormular wurde abgesendet und ist nicht leer.";
    }

    // Verifizierung der übergebenen Daten

    $_errors = [];

    if (empty($ersteller)) $_errors[] = "\nName fehlt.";
    if (empty($titel)) $_errors[] = "Titel fehlt.";
    if (empty($beitrag)) $_errors[] = "Beitrag fehlt.";

    // Sind Fehler im Array $_errors gespeichert?

    if (count($_errors) > 0) {
        foreach ($_errors as $error) {
            echo $error . "<br>";
        }
    } else {

        // Schreiben in die Datenbank
        echo "\nKeine Fehler - Eintrag wird in Datenbank gespeichert";
        $_sql = 'INSERT INTO gaestebuch
                     (ersteller,titel,beitrag,datum)
                       VALUES (
                     "'.mysqli_real_escape_string($link, $ersteller).'",
                     "'.mysqli_real_escape_string($link, $titel).'",
                     "'.mysqli_real_escape_string($link, $beitrag).'",
                     NOW());';

        mysqli_query($link, $_sql);
        echo "<br><b>Danke für Ihren Eintrag.</b><br><br>";
    }
?>

<!-- Lesen aus der Datenbank -->
<b>Alle Gästebucheinträge: </b><br><br>
<form action="gaestebuch.php" method="post">
    Ihr Name: <input type="text" name="ersteller" maxlength="30"><br>
    Titel des Beitrags: <input type="text" name="titel" maxlength="100"><br>
    Ihr Gästebucheintrag: <br>
    <textarea name="beitrag" cols="50" rows="5"></textarea><br>
    <input type="submit" name="submit" value="Eintragen">
</form>

<?php
$_sql = "SELECT * FROM gaestebuch ORDER BY datum ASC";
$_res = mysqli_query($link, $_sql);
while ($row = mysqli_fetch_array($_res, MYSQLI_ASSOC)) {
    echo "<hr>";
    echo "Eintrag Nummer: " . $row["id"];
    echo " von " . $row["ersteller"];
    echo " vom " . date("d.m.Y - H:i:s", strtotime($row["datum"]));
    echo "<br>Titel: " . $row["titel"];
    echo "<br>Text: ". str_replace("\n", "<br>", $row["beitrag"]);
    echo "<hr>";
}
?>


<?php
mysqli_close($link);
?>