<?php

include 'datum_uhrzeit_ausgabe.php';

function addieren($summand1, $summand2) {
    $summe = $summand1 + $summand2;
    echo "{$summand1} + {$summand2} ist gleich\n...\n{$summe}\n";
}

function subtrahieren($minuend, $subtrahend) {
    $differenz = $minuend - $subtrahend;
    echo "{$minuend} - {$subtrahend} ist gleich\n...\n{$differenz}\n";
}

function multiplizieren($faktor1, $faktor2) {
    $produkt = $faktor1 * $faktor2;
    echo "{$faktor1} * {$faktor2} ist gleich\n...\n{$produkt}\n";
}

function dividieren($dividend, $divisor) {
    $quotient = $dividend / $divisor;
    echo "{$dividend} + {$divisor} ist gleich\n...\n{$quotient}\n";
}

addieren(12, 4);
echo "\n";
subtrahieren(12, 4);
echo "\n";
multiplizieren(12, 4);
echo "\n";
dividieren(12, 4);

echo "\nProgrammende: " . ausgabe_datumuhrzeit();

?>