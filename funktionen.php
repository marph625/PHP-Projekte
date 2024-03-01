<?php

function ausgabe_datumuhrzeit() {
    # Y - 4-stelliges Jahr, m - 2-stelliger Monat, d - 2-stelliger Tag
    # H - Stunde nach deutscher Lesart (kleines h macht aus 14 Uhr 2 Uhr pm)
    # i - Minuten (warum auch immer i), s - Sekunden
    return date("d.m.y H:i:s");
}

# Ohne Rückgabewert
/* function addieren($summand1, $summand2) {
    $summe = $summand1 + $summand2;
    echo "{$summand1} + {$summand2} ist gleich\n...\n{$summe}\n";
} */

# Mit Rückgabewert

function addieren2($summand1, $summand2) {
    return $summand1 + $summand2;
}

$zahl1 = (int)readline("Gib eine Zahl ein");
$zahl2 = (int)readline("Gib eine weitere Zahl ein");

$ergebnis = addieren2($zahl1, $zahl2);
echo $ergebnis;