<?php
// Hier geht es vor allem um die Anwendung von Ternary-Operatoren und Null-Koaleszenz-Operatoren (und vielleicht Raumschiff-Operatoren)
$studentscores = array(
    "Megumi" => 1,
    "Yuji" => 6,
    "Nakami" => 4,
    "Satoru" => 5,
    "Aoi" => 3,
    "Kento" => 2,
    "Hans" => null,
    "Rudolf" => null
);

/* foreach ($studentscores as $key => $value) {
    if ($value != null) {
        if ($value <= 5) {
            echo $key." hat bestanden\n";
        } else {
            echo $key." ist durchgefallen\n";
        }
    } else {
        echo $key." hat keine Note\n";
    }    
} */

foreach ($studentscores as $key => $value) {
    $value = $value ?? "keine Note";

    $result[$key] = ($value !== "keine Note") ? ($value <= 5 ? "bestanden" : "durchgefallen") : "keine Note";
}

print_r($result);