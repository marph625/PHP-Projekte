<?php
// Hier geht es vor allem um die Anwendung von Ternary-Operatoren und Null-Koaleszenz-Operatoren (und vielleicht Raumschiff-Operatoren)
$studentscores = array(
    "Megumi" => 1,
    "Yuji" => 6,
    "Nobara" => 4,
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

/* print_r($passFail); */

// Aufgabe 5
foreach ($passFail as $k => $v) {
    echo $k,$v."\n";
}

// Aufgabe 6

/* print_r($studentscores);
print_r($passFail); */
echo "\n\n";

$counter_bestanden = 0;
$counter_durchgefallen = 0;
$counter_gesamtnote = 0;

for ($i = 0; $i < count($passFail); $i++) {
    $key = array_keys($passFail)[$i];
    $value = array_values($passFail)[$i];
    if ($value == " hat bestanden") {
        $counter_bestanden++;
        $counter_gesamtnote += $studentscores[$key];
    } else {
        $counter_durchgefallen++;
    }
}



echo "Die Anzahl der Schüler, die bestanden haben, beträgt: ".$counter_bestanden;
echo "\nDie durchschnittliche Gesamtnote der Schüler, die bestanden haben, lautet: ".$counter_gesamtnote / $counter_bestanden;
echo "\nDie Anzahl der Schüler, die durchgefallen sind, beträgt: ".$counter_durchgefallen;

// Aufgabe 7

$i = 0;
$counter_failed = 0;

    while ($i < count($passFail)) {
        $key = array_keys($passFail)[$i];
        $value = array_values($passFail)[$i];
        if ($value == " ist durchgefallen" || $value == " hat keine Note") {
            $counter_failed++;
            if ($counter_failed == 8) {
                break;
            }
        }
        $i++;
    }


echo "\nSo viele Leute müssen nachsitzen: ".$counter_failed;
echo "\ncounter_failed = ".$counter_failed."\nwhile_counter = ".$i;

print_r($key);
print_r($value);