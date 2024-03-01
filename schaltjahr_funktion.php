<?php

$jahr = (int)readline("Gib ein Jahr ein und ich prüfe, ob es ein sich um ein Schaltjahr handelt. ");

function schaltjahr($jahr) {
    if ($jahr % 4 == 0 && $jahr % 100 != 0 || $jahr % 4 == 0 && $jahr % 400 == 0) {
        echo "Treffer";
    } else {
        echo "Kein Schaltjahr";
    }
}

schaltjahr($jahr);