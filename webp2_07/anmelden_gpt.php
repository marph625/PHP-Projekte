<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webp2_07";


// GPT3.5-Version
if (isset($_POST['name'], $_POST['password'])) {
    $kunden_name = $_POST['name'];
    $kunden_password = $_POST['password'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Soll SQL-Injections verhindern
        $select = $conn->prepare("SELECT name, password FROM kunden WHERE name = :name");
        $select->bindParam(':name', $kunden_name);
        $select->execute();
        $dbpw = $select->fetchAll()[0]['password'];
        print_r($dbpw[0]['password']);
    
        // password_verify wird genutzt, um Passwort 'sicher' zu vergleichen
        if ($user && password_verify($kunden_password, $dbpw)) {
            echo "Login erfolgreich";
        } else {
            echo "Zugang verweigert. Benutzername oder Passwort falsch";
            #var_dump($user);
        }
    
    } catch (PDOException $e) {
        echo "Verbindung fehlgeschlagen";
    }
} else {
    echo "Benutzername und Passwort angeben";
}