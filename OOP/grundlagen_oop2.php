<?php
// Definition Klasse User
class User{
    // Definitionen der Eigenschaften
    // public -> offener Zugriff von außen
    // private -> gesperrter direkter Zugriff von außen
    // protected -> für vererbte Klassen - sonst nach außen wie private
    private $name;
    public $password;
    private $email;

    // Definition der Methode setEmail
    private function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) == true;
    }

    // Set-Methode bekommt Parameter
    public function setName($name) {
        $this->name = $name;
    }

    // Get-Methode benötigt keinen Parameter
    public function getName() {
        return $this->name;
    }

    public function setEmail($email) {
        if ($this->validateEmail($email)) {
            $this->email = $email;
        }
    }

    public function getEmail() {
        return $this->email;
    }
} // Ende der Klasse

// Definition zweier Objekte

$user1 = new User(); // new instanziert das Objekt $user auf die Klasse User()
$user1->setName("Ernie");
$user1->setEmail("erniesesam@strasse.de");

$user2 = new User();
$user2->setName("Bert");
$user2->setEmail("bert@sesamstrasse.de");

echo $user1->getName() . " hat die Mail-Adresse " . $user1->getEmail() . " und " . $user2->getName() . " hat die Mail-Adresse " . $user2->getEmail();