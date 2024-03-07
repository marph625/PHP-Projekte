<?php
$studentscores = [
    "Fred" => 1,
    "Frida" => 2,
    "Frodo" => 3,
    "Fridjof" => 4,
    "Freya" => 5,
    "Fritz" => 6,
    "Franzi" => null
];

foreach ($studentscores as $student => $score) {
    $score = $score ?? "keine Benotung";
    $passFail[$student] = ($score !== "keine Benotung") ? ($score <= 3 ? "bestanden" : "nicht bestanden") : "muss nachschreiben";  
    echo $student." Note: ".$score."\n";
}

$zähler_bestanden = 0;
$gesamtnote_bestanden = 0;

for ($i = 0; $i < count($passFail); $i++) {
    
    $schüler = array_keys($passFail);
    $urteil = array_values($passFail);
    $note = array_values($studentscores);

    if ($urteil[$i] === "bestanden") {
        $zähler_bestanden++;
        $gesamtnote_bestanden += $note[$i];
    }
}

$counter_nichtbestanden = 0;
$schwelle = 1;

// Aufgabe 8

while ($counter_nichtbestanden <= $schwelle) {
    $while_counter = 0;
    $while_counter++;
    while ($while_counter < count($passFail)) {
        $schüler = array_keys($passFail);
        $urteil = array_values($passFail);
        if ($counter_nichtbestanden == $schwelle) {
            echo "Klausur muss wiederholt werden";
            break 2;
        }
        if ($urteil[$while_counter] == "nicht bestanden") {
            $counter_nichtbestanden++;
            // Ausgabe der Namen der Schüler, die nicht bestanden haben
            echo $schüler[$while_counter]." => ".$urteil[$while_counter]."\n";
        }
        $while_counter++;
    }
    
}



echo "\nAnzahl Schüler, die bestanden haben: ".$zähler_bestanden;
echo "\nAnzahl Schüler, die durchgefallen sind: ".$counter_nichtbestanden;
echo "\nDurchschnittsnote der Schüler, die bestanden haben: ".$gesamtnote_bestanden / $zähler_bestanden;