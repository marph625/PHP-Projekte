<?php
session_start();

include("verbindung.php");
include("funktionen.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['benutzer_name'];
    $password = $_POST['passwort'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        // Benutzerdaten aus Datenbank lesen
        $query = "SELECT * FROM $tablename WHERE benutzer_name = '$user_name' LIMIT 1";
        $result = mysqli_query($con, $query);

        // Gibt es $result?
        if ($result) {

            // Gibt es $result und mindestens einen Datensatz?
            if ($result && mysqli_num_rows($result) > 0) {

                // Benutzerdaten werden in einem assoziativen Array gespeichert
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['passwort'] === $password) {

                    // Wenn es ein result gibt, wird überprüft, ob es einen Datensatz in der Tabelle 'benutzer' gibt
                    // Wenn zudem das eingegebene Passwort mit dem gespeicherten Passwort aus der DB
                    // und die benutzer_id aus der Session mit der benutzer_id aus der Datenbank übereinstimmt,
                    // wird der Nutzer zur index.php weitergeleitet und die Session wird beendet
                    $_SESSION['benutzer_id'] = $user_data['benutzer_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo "Benutzername oder Passwort falsch";
    } else {
        echo "Benutzername oder Passwort falsch";
    }
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmelden</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div id="box">
        <form method="post">
            <div style="font-size: 30px; margin: 10px;">Anmelden</div>
            <input id="text" type="text" name="benutzer_name" placeholder="Geben Sie Ihren Benutzernamen ein"><br><br>
            <input id="text" type="password" name="passwort" placeholder="Geben Sie Ihr Passwort ein"><br><br>

            <input id="button" type="submit" value="Bestätigen"><br><br>

            <a href="registrieren.php" style="font-size: 20px; margin: 10px;">Registrieren</a><br><br>
        </form>
    </div>
</body>

</html>