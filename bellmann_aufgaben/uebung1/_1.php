<?php

/*
1. Erstelle ein assoziatives Array mit dem Namen "studentScores", das die Noten von verschiedenen Schülern enthält. Die Schlüssel sollen die Namen der Schüler sein und die Werte ihre Noten.
2. Verwende den ternären Operator, um für jede Note festzustellen, ob der Schüler bestanden oder durchgefallen ist. Wenn die Note größer oder gleich 5 ist, gilt der Schüler als bestanden, andernfalls ist er durchgefallen. Speichere die Ergebnisse in einem neuen Array mit dem Namen "passFail".
3. Verwende den Null-Coalesce-Operator, um sicherzustellen, dass ein Schüler eine Standardnote erhält, falls keine Note vorhanden ist. Dies könnte beispielsweise eine Note von 0 sein.
4. Verwende eine foreach-Schleife, um das Array "studentScores" zu durchlaufen und die Namen der Schüler sowie ihre Noten auszugeben.
5. Verwende eine foreach-Schleife mit einem assoziativen Array, um das Array "passFail" zu durchlaufen und für jeden Schüler auszugeben, ob er bestanden oder durchgefallen ist.
6. Verwende eine for-Schleife, um die Anzahl der bestandenen Schüler zu zählen und die Gesamtnote der bestandenen Schüler zu berechnen.
7. Verwende eine while-Schleife, um die Anzahl der durchgefallenen Schüler zu zählen und ihre Namen auszugeben.
8. Implementiere eine Dauerschleife, die solange läuft, bis ein bestimmtes Kriterium erfüllt ist. Zum Beispiel könnte die Schleife laufen, bis die Anzahl der durchgefallenen Schüler einen bestimmten Schwellenwert überschreitet.
9. Nutze die alternative Syntax für foreach, if und echo, um die Ausgabe des Programms zu gestalten und sicherzustellen, dass der Code gut lesbar ist.
10. Teste das Programm mit verschiedenen Eingabedaten und überprüfe, ob die Ausgabe den erwarteten Ergebnissen entspricht.
*/

// Assoziatives Array
$studentscores = [
    "Fred" => 1,
    "Frida" => 2,
    "Frodo" => 3,
    "Fridjof" => 4,
    "Freya" => 5,
    "Fritz" => 6,
    "Franzi" => null
];

// foreach-Schleife mit null-Koaleszenz und ternärem Operator
foreach ($studentscores as $student => $score) {
    $score = $score ?? "keine Benotung";
    $passFail[$student] = ($score !== "keine Benotung") ? ($score <= 3 ? "bestanden" : "nicht bestanden") : "muss nachschreiben";  
    echo $student." Note: ".$score."\n";
}

print_r($passFail);
var_dump($passFail);

// Initialisierung einer Zählervariable, die die Anzahl der Schüler zählt, die bestanden haben
// Initialisierung einer weiteren Zählervariable für die Gesamtnote
$zähler_bestanden = 0;
$gesamtnote_bestanden = 0;

// for-Schleife, um Anzahl der bestandenen Schüler zu zählen und Durchschnittsnote zu berechnen
for ($i = 0; $i < count($passFail); $i++) {
    
    // array_key() bzw. array_values() geben Array zurück
    $schüler = array_keys($passFail);
    $urteil = array_values($passFail);
    $note = array_values($studentscores);

    if ($urteil[$i] === "bestanden") {
        $zähler_bestanden++;
        $gesamtnote_bestanden += $note[$i];
    }
}

print_r($schüler);
print_r($urteil);
print_r($schüler);

// Initialisierung von Zählervariablen

$while_counter = 0;
$counter_nichtbestanden = 0;
$schwelle = 3;

// while-Schleife zur Ermittlung der Anzahl der Schüler, die nicht bestanden haben


while ($while_counter < count($passFail)) {
    $schüler = array_keys($passFail);
    $urteil = array_values($passFail);
    if ($urteil[$while_counter] == "nicht bestanden") {
        $counter_nichtbestanden++;
        // Ausgabe der Namen der Schüler, die nicht bestanden haben
        echo $schüler[$while_counter]." => ".$urteil[$while_counter]."\n";
    }
    $while_counter++;
}

echo "\nAnzahl Schüler, die bestanden haben: ".$zähler_bestanden;
echo "\nAnzahl Schüler, die durchgefallen sind: ".$counter_nichtbestanden;
echo "\nDurchschnittsnote der Schüler, die bestanden haben: ".$gesamtnote_bestanden / $zähler_bestanden;