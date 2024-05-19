<?php

# Einfache Bedingung

/* $_zahl = 4;

if ($_zahl == 5) {
    echo "Die Variable ist gleich 5.";
} else {
    echo "Die Variable ist nicht gleich 5.";
}
echo "\n";
$_zahl2 = 10;
$_name = "Hand";

if ($_zahl2 == 11) {
    echo "Die Variable hat den Wert 11";
} else {
    if ($_name == 'Gandalf') {
        echo "Die Variable hat nicht den Wert 11\n";
        echo "Eine zweite Variable wurde übeprüft...\n";
        echo "Die Variable 'name' hat den Wert 'Gandalf'.";
    } else {
        echo "Die Variable 'name' hat nicht den Wert 'Gandalf'\n";
        echo "Wo ist der Zauberer?\n";
        echo "Weder die eine noch die andere Variable haben den vorgesehenen Wert.";
    }
} */

/* $_zahl3 = 4;

if ($_zahl3 == 0) {
    echo "Zahl = 0";
} else if ($_zahl3 == 1) {
    echo "Zahl = 1";
} else if ($_zahl3 == 2) {
    echo "Zahl = 2";
} else if ($_zahl3 == 3) {
        echo "Zahl = 3";
} else {
    echo "Zahl ist nicht 0, 1, 2 oder 3";
} */

/* $_zahl4 = 10;

if ($_zahl4 <= 10) {
    echo "Erfolgreich";
} else {
    echo "Nicht erfolgreich.";
} */

$name = "Frodo";
$email = "";
$betreff = "Mordor Wegplanung";
/* $email = "ringträger@mail.de";
$betreff = "Mordor Wegplanung"; */

/*
if ($name != '') {
    if ($email != '') {
        echo "Name und E-Mail Adresse wurden ausgefüllt.";
    } else {
        echo "Fehler: Keine E-Mail Adresse gefunden.";
    }
} else {
    echo "Fehler: Kein Name gefunden.";
} */

# Kürzere Version mit logischem AND && + OR ||
# && -> Beide Bedingungen müssen erfüllt sein
# || -> Eine von beiden Bedinungen muss erfüllt sein
# Einzelne Bedingungen müssen nicht in Klammern stehen

if ($name!='' || $email!='' && $betreff!='') {
    echo "Parameter wurde(n) übergeben.\n";
    echo "Name: {$name}\nE-Mail: {$email}\nBetreff: {$betreff}";
} else {
    echo "Fehler: Name, E-Mail oder Betreff wurde nicht erkannt.";
}
?>