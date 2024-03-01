<?php
// Definition Klasse User
class User{
    // Definitionen der Eigenschaften
    // public -> offener Zugriff von außen | private, protected?
    public $name;
    public $password;
    public $email;

    // Definition der Methode setEmail
    function setEmail($newEmail) {
        if (filter_var($newEmail, FILTER_VALIDATE_EMAIL) == true) {
            $this->email = $newEmail;
            return true;
        }
        return false; // Mail-Adresse konnte nicht gespeichert werden
    }
} // Ende der Klasse

// Definition zweier Objekte

$ernie = new User(); // new instanziert das Objekt $user auf die Klasse User()
$ernie->name = "Ernie";
$ernie->setEmail("ernie@sesamstrasse.de");

$bert = new User();
$bert->name = "Bert";
$bert->setEmail("bert@sesamstrasse.de");

echo "Ernie hat die Mail-Adresse $ernie->email und Bert hat die Mail-Adresse $bert->email";