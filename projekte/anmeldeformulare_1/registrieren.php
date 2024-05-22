<?php
// Session für diese Sitzung wird gestartet
session_start();

include("verbindung.php");
include("funktionen.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['benutzer_name'];
    $password = $_POST['passwort'];
    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        // Benutzerdaten in Datenbank speichern

        // user_id wird mit zufälliger Länge zwischen 5 und bis zu 20 Zeichen erstellt
        $user_id = random_num(20);

        // SQL-Query wird definiert
        $query = "INSERT INTO $tablename (benutzer_id, benutzer_name, passwort) VALUES ('$user_id', '$user_name', '$password');";

        // SQL-Query wird nach Datenbankverbindung ausgeführt
        mysqli_query($con, $query);

        // Nutzer wird zur Seite anmelden.php weitergeleitet und die Session wird beendet
        header("Location: anmelden.php");
        die;
    } else {
        // Benutzername darf nicht leer sein und nicht ausschließlich aus Nummern bestehen
        // Passwort darf nicht leer sein
        echo "Bitte geben Sie korrekte Anmeldedaten ein";
    }
}

?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrieren</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div id="box">
        <form method="post">
            <div style="font-size: 30px; margin: 10px;">Registrieren</div>
            <input id="text" type="text" name="benutzer_name" placeholder="Geben Sie Ihren Benutzernamen ein"><br><br>
            <input id="text" type="password" name="passwort" placeholder="Geben Sie Ihr Passwort ein"><br><br>

            <input id="button" type="submit" value="Bestätigen"><br><br>

            <a href="anmelden.php" style="font-size: 20px; margin: 10px;">Anmelden</a><br><br>
        </form>
    </div>
</body>

</html>