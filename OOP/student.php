<?php
// Definition Klasse Student
class Student {
    private $id;
    private $vorname;
    private $nachname;
    private $alter;
    private $hauptfach;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setVorname($vorname) {
        $this->vorname = $vorname;
    }

    public function getVorname() {
        return $this->vorname;
    }

    public function setNachname($nachname) {
        $this->nachname = $nachname;
    }

    public function getNachname() {
        return $this->nachname;
    }

    public function setAlter($alter) {
        $this->alter = $alter;
    }

    public function getAlter() {
        return $this->alter;
    }

    public function setHauptfach($hauptfach) {
        $this->hauptfach = $hauptfach;
    }

    public function getHauptfach() {
        return $this->hauptfach;
    }

    public function hatGeburtstag($alter) {
        $this->alter++;
    }
    
    public function wechseltHauptfach($hauptfach_neu) {
        $this->hauptfach = $hauptfach_neu;
    }
}

$student1 = new Student();
$student1->setId(1);
$student1->setVorname("Susi");
$student1->setNachname("Sargnagel");
$student1->setAlter(22);
$student1->setHauptfach("Englisch");
$student1->wechseltHauptfach("Latein");
$student1->wechseltHauptfach("Biologie");
$student1->hatGeburtstag($student1->getAlter());

$student2 = new Student();
$student2->setId(2);
$student2->setVorname("Alfred");
$student2->setNachname("Amsel");
$student2->setAlter(24);
$student2->setHauptfach("Ameisenkunde");
$student2->hatGeburtstag($student2->getAlter());
$student2->hatGeburtstag($student2->getAlter());
$student2->wechseltHauptfach("Amselkunde");

echo "\nStudent ID: ".$student1->getId()."\nVorname: ".$student1->getVorname()."\nNachname: ".$student1->getNachname()."\nAlter: ".$student1->getAlter()."\nHauptfach: ".$student1->getHauptfach(); 
echo "\n\nStudent ID: ".$student2->getId()."\nVorname: ".$student2->getVorname()."\nNachname: ".$student2->getNachname()."\nAlter: ".$student2->getAlter()."\nHauptfach: ".$student2->getHauptfach(); 