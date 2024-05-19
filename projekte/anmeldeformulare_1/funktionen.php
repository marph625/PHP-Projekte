<?php

function check_login($con) {

    // Erster Check, um zu prüfen, ob eine Benutzer ID existiert.
    if(isset($_SESSION['benutzer_id'])) {
        $id = $_SESSION['benutzer_id'];
        $query = "SELECT * FROM benutzer WHERE benutzer_id = '$id' LIMIT 1;";
        $result = mysqli_query($con,$query);
        
        // Zweiter Check, um zu prüfen, ob sich die gesuchte Benutzer ID in der Datenbank befindet
        if ($result && mysqli_num_rows($result) > 0) {

            // Benutzerdaten werden in Variable gespeichert und wieder zurück gegeben
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    // Weiterleitung zum Login
    header("Location: anmelden.php");
    // Session wird zerstört
    die;

}

function random_num($length) {

    $text = "";
    
    if ($length < 5) {
        // $lenght soll mindestens 5 sein
        $length = 5;
    }

    $len = rand(4, $length);

    for ($i=0; $i < $len; $i++) {
        // .= ist ein Operator, um dem Text weitere Zeichen hinzuzufügen
        $text .= rand(0, 9);
    }

    return $text;

}