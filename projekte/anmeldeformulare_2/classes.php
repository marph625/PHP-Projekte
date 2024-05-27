<?php

// DATENBANK-KLASSE

class DB
{
    public $con;

    // Konstruktor
    function __construct() {
        $string = "mysql:host=localhost;dbname=hash_db";
        
        // Objekt der PDO-Klasse wird erzeugt
        // Benutzer = root, passwort ist leer
        $this->con = new PDO($string, "root", "");
    }

    // ### Methode zum Schreiben von Datensätzen ###

    public function write($query, $data = array()) {

        // Prepare-Methode der PDO-Klasse wird benutzt, um SQL-Injektionen vorzubeugen bzw. zu verhindern
        // Hier werden auf Methoden der PDO-Klasse aufgerufen
        $stmt = $this->con->prepare($query);
        $check = $stmt->execute($data);

        if ($check) {
            return true;
        }
        return false;
    }

    // ### Methode zum Lesen von Datensätzen ###

    public function read($query, $data = array()) {

        $stmt = $this->con->prepare($query);
        $check = $stmt->execute($data);

        if ($check) {
            
            // Holt Datensatz und speichert ihn in einem assoziativen Array
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Wenn $rows ein Array ist und größer als 0 ist, soll es zurückgegeben werden
            if (is_array($rows) && count($rows) > 0) {
                return $rows;
            }
        }
        return false;
    }
}

// USER-KLASSE

class User
{
    // $errors wird nur innerhalb der User-Klasse verwendet
    protected $errors = array();

    // Methode zum Erstellen eines Users
    public function create($post_data) {
        $this->errors = array();
        
        // Benutzer übergibt per Eingabefeld seine Daten
        $username = $post_data['username'];
        $email = $post_data['email'];
        $password = $post_data['password'];

        // Verifizierung der Daten
        
        if (empty($username)) {
            $this->errors[] = "Bitte geben Sie einen Benutzernamen ein";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Bitte geben Sie eine gültige E-Mail Adresse ein";
        }

        // Wenn Passwort leer ist ODER weniger als 4 Zeichen hat
        if (empty($password) || strlen($password) < 4) {
            $this->errors[] = "Bitte geben Sie ein Passwort ein. Das Passwort muss mindestens 4 Zeichen lang sein";
        }


        // Datenspeicherung
        // Wenn es keine errors gibt, sollen die übergebenen Daten gespeichert werden
        if (count($this->errors) == 0) {
            $post_data['date'] = date("Y-m-d H:i:s");
            
            // sha1 -> Secure Hash Algorithm -> gilt heute als unsicher
            // sha256 ist sicherer und gibt einen 64-stelligen String aus

            // Gehashtes Passwort wird hier gespeichert
            $post_data['password'] = hash("sha256", $post_data['password']);
            
            // Um SQL-Injektionen vorzubeugen, werden an dieser Stelle benannte Parameter (:email, :password) verwendet
            $query = "INSERT INTO users (username, password, email, date) VALUES (:username, :password, :email, :date);";

            // Datenbankobjekt wird erstellt
            $db = new DB();

            // Daten werden über die write-Methode aus der DB-Klasse in die Tabelle 'users' in die Datenbank geschrieben
            $db->write($query, $post_data);
        }
        return $this->errors;
    }

    public function login($post_data) {

        // Fehlermeldungen werden in einem Array gespeichert
        $this->errors = array();
        
        // Eingegebenes Passwort wird mit dem selben Algorithmus gehasht
        // Wenn die Hash-Strings übereinstimmen, ist der Login erfolgreich
        // Auf diese Weise kann man selbst mit Datenbankzugriff nicht auf die Passwörter schließen
        $post_data['password'] = hash("sha256", $post_data['password']);

        $query = "SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1;";
        $db = new DB();
        $data = $db->read($query, $post_data);

        // Wenn $data ein Array ist, soll der verifizierte Nutzer im $_SESSION Array gespeichert werden
        if (is_array($data)) {
            $_SESSION['verified_user'] = $data[0]['username'];
        } else {
            // Ansonsten wird eine spezifische Fehlermeldung ausgegeben
            $this->errors[] = "Falscher Benutzername und/oder falsches Passwort";
        }
        // Existierende Fehlermeldungen werden zurückgegeben
        return $this->errors;
    }
}