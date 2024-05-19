<?php
function ausgabe_datumuhrzeit() {
    # Y - 4-stelliges Jahr, m - 2-stelliger Monat, d - 2-stelliger Tag
    # H - Stunde nach deutscher Lesart (kleines h macht aus 14 Uhr 2 Uhr pm)
    # i - Minuten (warum auch immer i), s - Sekunden
    return date("d.m.y H:i:s");
}