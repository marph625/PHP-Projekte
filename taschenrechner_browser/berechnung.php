<?php
# POST der von der HTML-Seite kommt -> in php POST Array
# $_POST[] -> von html über form method="POST"

# Hat php vom Formular (taschenrechner.html) etwas bekommen?
# $_POST[bezieht sich auf name attribut im input Tag innerhalb des Formulars]
if(!empty($_POST['submit'])) {

    #zahl1, zahl2, rz
    $zahl1 = $_POST['zahl1'];
    $zahl2 = $_POST['zahl2'];
    $rz = $_POST['rz'];

    # $rz (Rechenzeichen) bezieht sich auf den value im Option Tag
    if ($rz == '+') { # Addition
        # bcadd -> fertige Methode in php: (zahl1, zahl2, Anzahl Nachkommastellen)
        $ergebnis = bcadd($zahl1, $zahl2, 2);
        echo $zahl1 . $rz . $zahl2 . " = " . $ergebnis;
    }

    else if ($rz == '-') { # Subtraktion
        # bcadd -> fertige Methode in php: (zahl1, zahl2, Anzahl Nachkommastellen)
        $ergebnis = bcsub($zahl1, $zahl2, 2);
        echo $zahl1 . $rz . $zahl2 . " = " . $ergebnis;
    }

    else if ($rz == '*') { # Multiplikation
        # bcadd -> fertige Methode in php: (zahl1, zahl2, Anzahl Nachkommastellen)
        $ergebnis = bcmul($zahl1, $zahl2, 2);
        echo $zahl1 . $rz . $zahl2 . " = " . $ergebnis;
    }

    # Division durch 0 ist nicht erlaubt 
    else if ($rz == '/'  && $zahl2 != 0) { # Division
        # bcadd -> fertige Methode in php: (zahl1, zahl2, Anzahl Nachkommastellen)
        $ergebnis = bcdiv($zahl1, $zahl2, 5);
        echo $zahl1 . $rz . $zahl2 . " = " . $ergebnis;
    } else {      
        echo "Fehler: Division durch 0 ist nicht erlaubt!";
    }
}
?>