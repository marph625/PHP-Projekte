<?php
if (!empty($_POST['submit_mwst0'])) {
    $kraftstoff = $_POST['kraftstoff'];
    $tankmonat = $_POST['tankmonat'];

    $tankfuellung1 = $_POST['tankfuellung1'];
    $zahlbetrag1 = $_POST['zahlbetrag1'];
    $tankfuellung2 = $_POST['tankfuellung2'];
    $zahlbetrag2 = $_POST['zahlbetrag2'];
    $tankfuellung3 = $_POST['tankfuellung3'];
    $zahlbetrag3 = $_POST['zahlbetrag3'];
    $tankfuellung4 = $_POST['tankfuellung4'];
    $zahlbetrag4 = $_POST['zahlbetrag4'];

    #echo $kraftstoff, $tankmonat, $tankfuellung1, $zahlbetrag1, $tankfuellung2, $zahlbetrag2, $tankfuellung3, $zahlbetrag3, $tankfuellung4, $zahlbetrag4;
    #echo $kraftstoff . "<br>" . $tankmonat . "<br>" . $tankfuellung1 . "<br>" . $zahlbetrag2;
    $gesamttankmenge = $tankfuellung1 + $tankfuellung2 + $tankfuellung3 + $tankfuellung4;
    $monatskosten = $zahlbetrag1 + $zahlbetrag2 + $zahlbetrag3 + $zahlbetrag4;
    $durchschnittspreis = $monatskosten / $gesamttankmenge;

    echo "Ihre Kraftstoffrechnung:<br>";
    echo "Gesamttankmenge: " . $gesamttankmenge . " Liter<br>";
    echo "Ihre Kraftstoffkosten im Monat " . $tankmonat . " betragen " . number_format((float)$monatskosten, 2) . "€<br>";
    echo "Durchschnittlich beträgt der Preis für " . $kraftstoff . " " . number_format((float)$durchschnittspreis, 2) . "€";
    
}

if (!empty($_POST['submit_mwst1'])) {
    $kraftstoff = $_POST['kraftstoff'];
    $tankmonat = $_POST['tankmonat'];

    $tankfuellung1 = $_POST['tankfuellung1'];
    $zahlbetrag1 = $_POST['zahlbetrag1'];
    $tankfuellung2 = $_POST['tankfuellung2'];
    $zahlbetrag2 = $_POST['zahlbetrag2'];
    $tankfuellung3 = $_POST['tankfuellung3'];
    $zahlbetrag3 = $_POST['zahlbetrag3'];
    $tankfuellung4 = $_POST['tankfuellung4'];
    $zahlbetrag4 = $_POST['zahlbetrag4'];

    $gesamttankmenge = $tankfuellung1 + $tankfuellung2 + $tankfuellung3 + $tankfuellung4;
    $monatskosten = $zahlbetrag1 + $zahlbetrag2 + $zahlbetrag3 + $zahlbetrag4;
    $durchschnittspreis = $monatskosten / $gesamttankmenge;

    echo "Ihre Kraftstoffrechnung:<br>";
    echo "Gesamttankmenge: " . $gesamttankmenge . " Liter<br>";
    echo "Ihre Kraftstoffkosten im Monat " . $tankmonat . " betragen zuzüglich Mehrwertsteuer " . number_format((float)$monatskosten*1.19, 2) . "€<br>";
    echo "Durchschnittlich beträgt der Preis für " . $kraftstoff . " zuzüglich Mehrwertsteuer " . number_format((float)$durchschnittspreis*1.19, 2) . "€";
}