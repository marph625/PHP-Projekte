<?php
// Definition Klasse Kunde
class Kunde {
    private $name;
    private $kontostand;
    private $kontonummer;
    private $betrag;

    // set und get Methoden name

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    // set und get Methoden kontonummer

    public function setKontonummer($kontonummer) {
        $this->kontonummer = $kontonummer;
    }

    public function getkontonummer() {
        return $this->kontonummer;
    }

    // set und get Methoden kontostand

    public function setKontostand($kontostand) {
        $this->kontostand = (int)readline("Hallo ".$this->name."! Geben Sie Ihren Kontostand in € ein: ");
    }

    public function getKontostand() {
        return $this->kontostand;
    }

    public function setBetrag($betrag) {
        $this->betrag = (int)readline("Geben Sie den Betrag in € ein, den Sie abheben möchten: ");
    }

    public function getBetrag() {
        return $this->betrag;
    }

    // Funktion zum Geld abheben

    public function geldAbheben($betrag) {
        if ($betrag <= $this->kontostand) {
            echo "\n".$this->name."\nKonto-Nr: ".$this->kontonummer."\nAktueller Kontostand: ".$this->kontostand."€\n";
            $this->kontostand -= $betrag;
            echo "\n".$this->name."\nKonto-Nr: ".$this->kontonummer."\nBehebung: ".$this->betrag."€\nNeuer Kontostand: ".$this->kontostand."€\n\n";
        } else {
            echo "Der aktuelle Kontostand von ".$this->name." beträgt ".$this->kontostand."€\n\n";
        }
    }
} // Ende Klasse

$kunde1 = new Kunde();
$kunde1->setName("Maximilian Bauer");
$kunde1->setKontonummer("AB-10000-34");
$kunde1->setKontostand(0);
$kunde1->setBetrag(0);
$kunde1->geldAbheben($kunde1->getBetrag());

$kunde2 = new Kunde();
$kunde2->setName("Rüdiger Voltwurst");
$kunde2->setKontonummer("AB-10000-35");
$kunde2->setKontostand(0);
$kunde2->setBetrag(0);
$kunde2->geldAbheben($kunde2->getBetrag());

$kunde3 = new Kunde();
$kunde3->setName("Anja Hypomanja");
$kunde3->setKontonummer("AB-10000-36");
$kunde3->setKontostand(0);
$kunde3->setBetrag(0);
$kunde3->geldAbheben($kunde3->getBetrag());