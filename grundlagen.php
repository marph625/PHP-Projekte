<?php
# Zeilenkommentar
// Auch Zeilenkommentar

/*
Blockkommentar
Fortsetzung
Ende
*/

/* Tastenkombi: markieren -> shift + alt + a */

/* $meineVariable = "Weltenfresser";
$Ergebnis = (3+4)*2;

$z1 = 123;
$z2 = "77";
$z3 = 25.5;
$bool = true;
$ergebnis = $z1 + $z2;
echo $meineVariable;
echo "\n"; # Zeilenschaltung in der Konsole
echo "<br>"; # Zeilenschaltung im Webbrowser -> html-tag
echo "$meineVariable";
echo "<br>";
echo "\n"; # Zeilenschaltung
echo '$meineVariable';
echo "\n"; # Zeilenschaltung
echo "Hallo {$meineVariable}en";
echo "\n"; # Zeilenschaltung
echo "Hallo " . $meineVariable . "en";
echo "\n"; # Zeilenschaltung
echo "{$z1} + {$z2} = {$z3}";
echo "\n";

var_dump($meineVariable); #braucht zur Ausgabe kein echo
echo "\n";
echo gettype($meineVariable); #in Verbindung mit echo
echo "\n";
echo gettype($z1);
echo "\n";
echo $z2 . " " . gettype($z2);
echo "\n";
echo gettype($z3);
echo "\n";
echo $bool . " " .  gettype($bool);
echo "\n";
var_dump($bool); */

$Text = "supercalifragilisticexpialigetisch";
/* echo $Text;
echo "\n";
echo "Dieser Text besteht aus " . strlen($Text) . " Zeichen.";
echo "\n";
echo "Text in kleinbuchstaben: ". strtolower($Text);
echo "\n";
echo "Text in GROSSBUCHSTABEN: ". strtoupper($Text);
 */
# die ersten 5 Buchstaben eines Textes
# Funktion substr($Text, $Start, $Länge)

echo "Erste 5 Buchstaben von '$Text': " . "\n" . substr($Text, 0, 9);
?>