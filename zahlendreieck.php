<?php
# Ein Programm, das ein Zahlendreieck ausgibt.

$counter_out = 0;
while ($counter_out < 10) {
    $counter_in = 0;
    while ($counter_in <= $counter_out) {
        echo $counter_in . " ";
        $counter_in++;
    }
    echo "\n" . "<br>";
    $counter_out++;
}