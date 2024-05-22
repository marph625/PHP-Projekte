<?php

class DB
{
    protected $con;

    // Konstruktor
    function __construct() {
        $string = "mysql:host=localhost;dbname=hash_db";
        // Benutzer = root, passwort ist leer
        $this->con = new PDO($string, "root", "");
    }

    // Funktion zum Schreiben von Datensätzen

    public function write($query, $data = array()) {

        // Prepare wird benutzt, um SQL-Injektionen vorzubeugen bzw. zu verhindern
        $stm = $this->con->prepare($query);
        $check = $stm->execute($data);

        if ($check) {
            return true;
        }
        return false;
    }

    // Funktion zum Lesen von Datensätzen

    public function read($query, $data = array()) {

        // Prepare wird benutzt, um SQL-Injektionen vorzubeugen bzw. zu verhindern
        $stm = $this->con->prepare($query);
        $check = $stm->execute($data);

        if ($check) {
            // Holt Datensatz und speichert ihn in einem assoziativen Array
            $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($rows) && count($rows) > 0) {
                return $rows;
            }
        }
        return false;
    }
}

class User
{
    // $errors wird an dieser Stelle nur innerhalb der Klasse User verwendet, deshalb protected
    protected $errors = array();
    public function create($POST)
    {
        $this->errors = array();
        
        $username = $POST['username'];
        $email = $POST['email'];
        $password = $POST['password'];

        // Verifizierung der Daten
        if (empty($username)) {
            $this->errors[] = "Bitte geben Sie einen gültigen Benutzernamen ein";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Bitte geben Sie eine gültige E-Mail Adresse ein";
        }

        // Wenn Passwort leer ist ODER weniger als 4 Zeichen hat
        if (empty($password) || strlen($password) < 4) {
            $this->errors[] = "Das Passwort muss mindestens 4 Zeichen lang sein";
        }


        // Datenspeicherung

        if (count($this->errors) == 0) {
            $POST['date'] = date("Y-m-d H:i:s");
            
            // sha1 -> Secure Hash Algorithm -> gilt heute als unsicher
            // sha256 ist sicherer und gibt einen 64-stelligen String aus

            // Gehashtes Passwort wird hier gespeichert
            $POST['password'] = hash("sha256", $POST['password']);
            //$POST['password'] = password_hash($POST['password'], PASSWORD_DEFAULT);
            $query = "INSERT INTO users (username, password, email, date) VALUES (:username, :password, :email, :date);";
            $db = new DB();
            $db->write($query, $POST);
        }
        return $this->errors;
    }

    public function login($POST) {

        $this->errors = array();
        
        // Eingegebenes Passwort wird mit dem selben Algorithmus gehasht
        // Wenn die Hash-Strings übereinstimmen, ist der Login erfolgreich
        // Auf diese Weise kann man selbst mit Datenbankzugriff nicht auf die Passwörter schließen
        $POST['password'] = hash("sha256", $POST['password']);

        $query = "SELECT * FROM users WHERE email = :email && password = :password LIMIT 1;";
        $db = new DB();
        $data = $db->read($query, $POST);

        if (is_array($data)) {
            $_SESSION['hashed_user'] = $data[0]['username'];
        } else {
            $this->errors[] = "Falscher Benutzername und/oder falsches Passwort";
        }
        return $this->errors;
    }
}