<?php
/*
Dieser Code gehört nicht mir, sondern (ein)er anderen Person.
Dieser Code dient nur zu Studienzwecken.
*/

class Year {
    private $year;

    // Konstruktor anstatt set-Funktion
    function __construct($year) {
        $this->year = $year;
    }

    public function new_years() {
        $this->year++;
    }

    public function fast_forward($years) {
        $this->year += $years;
    }

    public function get_year() {
        return $this->year;
    }

    public function is_leap_year() {
        return (($this->year % 4 == 0) && (($this->year % 100 != 0) || ($this->year % 400 == 0)));
    }
}

$years = array(new year(2023), new year(2024), new year(400), new year(1600), new year(1900));

// foreach-Loop für Arrays
foreach ($years as $year) {
    // Ausgabe mit ternärem Auswahloperator (ternary conditional operator)
    echo $year->get_year() . " ist " . ($year->is_leap_year() ? "ein" : "kein") . " Schaltjahr<br>\n";
}