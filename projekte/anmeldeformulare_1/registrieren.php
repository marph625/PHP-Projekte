<?php
session_start();

include("verbindung.php");
include("funktionen.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['benutzer_name'];
    $password = $_POST['passwort'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        
        // Benutzerdaten in Datenbank speichern
        $user_id = random_num(20);
        $query = "INSERT INTO benutzer (benutzer_id, benutzer_name, passwort) VALUES ('$user_id', '$user_name', '$password');";

        mysqli_query($con, $query);

        header("Location: anmelden.php");
        die;
        
    } else {
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
</head>

<body>
    <style type="text/css">
    body {
        background-color: lightgrey;
    }

    #text {
        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid, thin #aaa;
        width: 100%;
    }

    #button {
        padding: 10px;
        width: 100px;
        background-color: white;
        border: none;
    }

    #box {
        background-color: lightblue;
        margin: auto;
        width: 300px;
        padding: 20px;
    }
    </style>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px;">Registrieren</div>
            <input id="text" type="text" name="benutzer_name"><br><br>
            <input id="text" type="password" name="passwort"><br><br>

            <input id="button" type="submit" value="Bestätigen"><br><br>

            <a href="anmelden.php">Anmelden</a><br><br>
        </form>
    </div>
</body>

</html>