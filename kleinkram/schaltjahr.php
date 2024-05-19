<?php
$jahr = 1904;

if ($jahr % 4 == 0) {
    if ($jahr % 100 == 0) {
        if ($jahr % 400 == 0) {
            echo "Treffer!";
        } else {
            echo "Kein Schaltjahr!";
        }
    } else {
        echo "Treffer!";
    }
} else {
    echo "Kein Schaltjahr!";
}
?>