<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>
        <?php
/* for ($zaehler = 1; $zaehler < 10; $zaehler++) {
    if ($zaehler == 5) {
        break;
    }
    echo $zaehler;
    echo "\n";
} */

$array = array(1, 2, 4, 8);

$fellowship = array("Gollum", "Frodo", "Samweis", "Merry", "Pippin", "Aragorn", "Boromir", "Gimli", "Legolas", "Gandalf");

# print_r() ist eine Funktion, die die Elemente eines Arrays und ihre jeweiligen Werte hübsch in der Konsole ausgibt.

print_r($array);
print_r($fellowship);

# printf() ist eine Funktion, die fast wie echo Strings in der Konsole ausgibt aber dazu noch formatieren kann

printf($fellowship[4]);
echo "\n";
echo $fellowship[4];
echo "\n";

### FOREACH-SCHLEIFE ### für Arrays und Listen

foreach($array as $bin_digit ) {
    echo $bin_digit;
    echo "\n";
}
echo "\n";
echo "1) Ausgabe einer foreach-Schleife\n\n";

foreach($fellowship as $member ) {
    echo $member;
    echo "\n";
}

echo "\nAnzahl der Mitglieder: " . count($fellowship) . "\n\n";
echo "2) Ausgabe einer einfachen for-Schleife\n\n";

### FOR-SCHLEIFE ### zählergesteuerte Schleife
for ($zaehler=0;$zaehler<count($fellowship);$zaehler++) {
    echo $fellowship[$zaehler] . "\n";
}

echo "\nAnzahl der Mitglieder: " . count($fellowship) . "\n\n";
echo "3) Ausgabe einer einfachen while-Schleife\n\n";

$zaehler2 = 0;
### WHILE-SCHLEIFE ### kopfgesteuerte Schleife
while ($zaehler2<count($fellowship)) {
    echo $fellowship[$zaehler2] . "\n";
    $zaehler2++;
}

echo "\nAnzahl der Mitglieder: " . count($fellowship) . "\n\n";
echo "4) Ausgabe einer einfachen do-while-Schleife\n\n";

$zaehler3 = 0;
### DO-WHILE-SCHLEIFE ### fußgesteuerte Schleife
do {
    echo $fellowship[$zaehler3] . "\n";
    $zaehler3++;
} while ($zaehler3<count($fellowship));

echo "\nAnzahl der Mitglieder: " . count($fellowship) . "\n\n";
?>
    </p>
</body>

</html>