<?php
// Definition der Klasse Schaltjahr
class Schaltjahr {
    private $jahr;

    public function setJahr($jahr) {
        $this->jahr = $jahr;
    }

    public function getJahr() {
        return $this->jahr;
    }

    public function berechneSchaltjahr($jahr) {
        if ($jahr % 4 == 0 && $jahr % 100 != 0 || $jahr % 400 == 0) {
            echo $jahr." ist ein Schaltjahr\n";
        } else {
            echo $jahr." ist kein Schaltjahr\n";
        }
    }
} // Ende der Klasse

$schaltjahr1 = new Schaltjahr();
$schaltjahr1->setJahr(2024);
$schaltjahr1->berechneSchaltjahr($schaltjahr1->getJahr());

$schaltjahr2 = new Schaltjahr();
$schaltjahr2->setJahr(2026);
$schaltjahr2->berechneSchaltjahr($schaltjahr2->getJahr());

$schaltjahr3 = new Schaltjahr();
$schaltjahr3->setJahr(1900);
$schaltjahr3->berechneSchaltjahr($schaltjahr3->getJahr());

$schaltjahr4 = new Schaltjahr();
$schaltjahr4->setJahr(2400);
$schaltjahr4->berechneSchaltjahr($schaltjahr4->getJahr());