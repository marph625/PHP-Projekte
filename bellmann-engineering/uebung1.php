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

// Aufgabe 1, 2, 3, 4
foreach ($studentscores as $key => $value) {

    $value = $value ?? 0;
    $passFail[$key] = ($value !== 0) ? ($value <= 5 ? " hat bestanden" : " ist durchgefallen") : (" hat keine Note");
    
}

print_r($passFail);

// Aufgabe 5
foreach ($passFail as $k => $v) {
    echo $k,$v."\n";
}

// Aufgabe 6