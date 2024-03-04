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
        $select = $conn->prepare("SELECT * FROM kunden WHERE name = :name");
        $select->bindParam(':name', $kunden_name);
        $select->execute();
        $user = $select->fetch(PDO::FETCH_ASSOC);
    
        // password_verify wird genutzt, um Passwort 'sicher' zu vergleichen
        if ($user && password_verify($kunden_password, $user['password'])) {
            echo "Login erfolgreich";
        } else {
            echo "Zugang verweigert. Benutzername oder Passwort falsch";
        }
    
    } catch (PDOException $e) {
        echo "Verbindung fehlgeschlagen";
    }
} else {
    echo "Benutzername und Passwort angeben";
}