<?php
session_start();

include("verbindung.php");
include("funktionen.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['benutzer_name'];
    $password = $_POST['passwort'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        
        // Benutzerdaten aus Datenbank lesen
        $query = "SELECT * FROM benutzer WHERE benutzer_name = '$user_name' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {

            if ($result && mysqli_num_rows($result) > 0) {
                
                $user_data = mysqli_fetch_assoc($result);
                
                if ($user_data['passwort'] === $password) {
                    
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
            <div style="font-size: 20px; margin: 10px;">Anmelden</div>
            <input id="text" type="text" name="benutzer_name"><br><br>
            <input id="text" type="password" name="passwort"><br><br>

            <input id="button" type="submit" value="Bestätigen"><br><br>

            <a href="registrieren.php">Registrieren</a><br><br>
        </form>
    </div>
</body>

</html>