<?php
$jahr = 2024;

if ($jahr % 4 == 0 && $jahr % 100 != 0 || $jahr % 4 == 0 && $jahr % 400 == 0) {
    echo "Treffer";
} else {
    echo "Kein Schaltjahr";
}
?>